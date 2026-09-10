/**
 * 接口文档"请求示例"生成器
 * 从每个 API 页面的「请求语法」「请求参数」表格解析方法/参数,
 * 自动生成 PHP/Java/Node/Go 四语言示例并以 code-group tabs 插入。
 *
 * 用法: node scripts/gen-api-examples.js
 * 规则: 已有「请求示例」的页面会被替换为新生成内容;跳过回调类页面。
 */
const fs = require('fs')
const path = require('path')

const DOCS_DIR = path.resolve(__dirname, '../docs')
const BASE_URL = 'http://sms.crmeb.net/api'
const SKIP_FILES = ['消息推送.md', '订单回调.md', '开票成功回调.md']
const LANGS = ['PHP', 'Java', 'Node', 'Go']

// 常见参数名 → 更有意义的占位值
const NAME_HINTS = [
  [/phone|mobile/i, '13800138000'],
  [/(url|link)$/i, 'https://www.example.com'],
  [/time|date$/i, '2026-01-01 12:00:00'],
  [/^param$/, '{"code":"1234"}'],
  [/sign/i, '一号通'],
  [/account/i, '13800138000'],
  [/temp_id/i, '562345'],
]

function walkApiPages (dir) {
  const out = []
  for (const item of fs.readdirSync(dir, { withFileTypes: true })) {
    const full = path.join(dir, item.name)
    if (item.isDirectory()) {
      out.push(...walkApiPages(full))
    } else if (
      item.name.endsWith('.md') &&
      !SKIP_FILES.includes(item.name) &&
      /\/API\//.test(full.replace(/\\/g, '/'))
    ) {
      out.push(full)
    }
  }
  return out
}

function cleanCell (text) {
  return (text || '').replace(/&#124;/g, '|').trim()
}

// 解析一个 markdown 表格(从指定行开始),返回行数组
function parseTable (lines, startIdx) {
  const rows = []
  let i = startIdx
  for (; i < lines.length; i++) {
    const line = lines[i].trim()
    if (!line.startsWith('|')) break
    const cells = line.split('|').slice(1, -1).map(cleanCell)
    if (cells.every(c => /^-{2,}$|^:-+:?$|^:-+$/.test(c.trim()))) continue // 分隔行
    if (cells[0] === '名称' || cells[0] === '') continue // 表头行
    rows.push(cells)
  }
  return { rows, next: i }
}

// 解析页面所有参数表: 主表 + 嵌套子表(如 goods请求参数)
function parseParamTables (md) {
  const lines = md.split('\n')
  const mainParams = []
  const subTables = {}

  for (let i = 0; i < lines.length; i++) {
    const heading = lines[i].trim()
    if (!heading.startsWith('### ') || !heading.includes('请求参数')) continue

    const headingText = heading.replace(/^###\s*/, '').replace(/<[^>]+>/g, '').trim()
    const isSub = headingText !== '请求参数' &&
      !['PATH请求参数', 'POST请求参数', 'GET请求参数', 'QUERY请求参数'].includes(headingText)
    const subKey = isSub ? headingText.replace(/请求参数$/, '') : null

    // 表格从下一个非空行开始
    let j = i + 1
    while (j < lines.length && !lines[j].trim().startsWith('|')) j++
    if (j >= lines.length) continue

    const { rows } = parseTable(lines, j)
    const params = rows
      .filter(cells => cells.length >= 4 && cells[0] && cells[0] !== '无')
      .map(cells => ({
        name: cells[0].trim(),
        type: (cells[1] || '字符串').trim(),
        required: (cells[2] || '').trim(),
        example: cells[3] ? cells[3].trim() : '',
      }))

    if (isSub) {
      subTables[subKey] = params
    } else {
      mainParams.push(...params)
    }
  }

  // 去重(同名取首次出现)
  const seen = new Set()
  const params = mainParams.filter(p => {
    if (seen.has(p.name)) return false
    seen.add(p.name)
    return true
  })
  return { params, subTables }
}

function parseRequestSyntax (md) {
  const idx = md.indexOf('### 请求语法')
  if (idx === -1) return null
  // 标题与围栏之间可能有引用行,围栏也可能带语言标注
  const m = md.slice(idx).match(/```[\w-]*\s*\n\s*(GET|POST|PUT|DELETE)\s+(\S+)/)
  if (!m) return null
  return { method: m[1].toUpperCase(), path: m[2] }
}

function placeholderFor (param) {
  const { name, type, example } = param
  if (type.startsWith('数组')) {
    try {
      const v = JSON.parse(example)
      if (Array.isArray(v)) return v
    } catch (e) { /* 使用默认 */ }
    return []
  }
  if (type.startsWith('对象')) {
    try {
      const v = JSON.parse(example)
      if (v && typeof v === 'object' && !Array.isArray(v)) return v
    } catch (e) { /* 使用默认 */ }
    return {}
  }
  if (type.startsWith('数字')) {
    const n = Number(example)
    if (example && example !== '--' && !Number.isNaN(n)) return n
    return 1
  }
  if (type.startsWith('布尔')) return example === 'true'
  // 字符串
  if (example && example !== '--' && !/[|<>\[\]{}]/.test(example) && example.length <= 60) {
    return example
  }
  for (const [re, val] of NAME_HINTS) {
    if (re.test(name)) return val
  }
  return 'xxx'
}

function buildSample (param, subTables) {
  const value = placeholderFor(param)
  const sub = subTables[param.name]
  if (sub && sub.length) {
    const obj = {}
    for (const p of sub) obj[p.name] = placeholderFor(p)
    if (param.type.startsWith('数组')) return [obj]
    return obj
  }
  return value
}

function buildRequestData (method, syntaxPath, params, subTables) {
  const pathParams = {}
  const bodyParams = {}
  const queryParams = {}

  for (const p of params) {
    const value = buildSample(p, subTables)
    if (new RegExp('\\{' + p.name + '\\}').test(syntaxPath)) {
      pathParams[p.name] = typeof value === 'string' ? value : String(value)
    } else if (method === 'GET') {
      queryParams[p.name] = value
    } else {
      bodyParams[p.name] = value
    }
  }

  let urlPath = syntaxPath.replace(/^\//, '')
  for (const [key, value] of Object.entries(pathParams)) {
    urlPath = urlPath.replace('{' + key + '}', encodeURIComponent(value))
  }
  // 参数表里没有覆盖到的路径参数兜底替换
  urlPath = urlPath.replace(/\{[^}]+\}/g, '1')

  let query = ''
  const qs = Object.entries(queryParams)
  if (qs.length) {
    query = '?' + qs.map(([k, v]) => k + '=' + encodeURIComponent(String(v))).join('&')
  }

  return {
    url: BASE_URL + '/' + urlPath + query,
    body: method === 'GET' ? null : bodyParams,
  }
}

// ---------- 各语言代码生成 ----------

function phpValue (value, indent) {
  const pad = ' '.repeat(indent)
  if (value === null) return 'null'
  if (Array.isArray(value)) {
    if (!value.length) return '[]'
    const inner = value.map(v => phpValue(v, indent + 4)).map(s => pad + '    ' + s + ',')
    return '[\n' + inner.join('\n') + '\n' + pad + ']'
  }
  if (typeof value === 'object') {
    const keys = Object.keys(value)
    if (!keys.length) return '{}'
    const inner = keys.map(k => pad + '    \'' + k + '\' => ' + phpValue(value[k], indent + 4) + ',')
    return '[\n' + inner.join('\n') + '\n' + pad + ']'
  }
  if (typeof value === 'number' || typeof value === 'boolean') return String(value)
  return '\'' + String(value).replace(/\\/g, '\\\\').replace(/'/g, "\\'") + '\''
}

function genPhp (method, url, body) {
  const lines = [
    '<?php',
    '',
    '$token = \'your access_token\';',
    '',
    '$ch = curl_init();',
    '',
    'curl_setopt_array($ch, [',
    "    CURLOPT_URL => '" + url + "',",
    '    CURLOPT_RETURNTRANSFER => true,',
    '    CURLOPT_HTTPHEADER => [',
    "        'Authorization: Bearer-' . $token,",
    "        'Content-Type: application/json',",
    '    ],',
  ]
  if (method === 'POST' && body) {
    lines.push('    CURLOPT_POST => true,')
    lines.push('    CURLOPT_POSTFIELDS => json_encode(' + phpValue(body, 4) + '),')
  }
  lines.push(']);')
  lines.push('')
  lines.push('$response = curl_exec($ch);')
  lines.push('curl_close($ch);')
  lines.push('')
  lines.push('var_dump(json_decode($response, true));')
  return lines.join('\n')
}

function genJava (method, url, body) {
  const lines = [
    'import java.net.URI;',
    'import java.net.http.HttpClient;',
    'import java.net.http.HttpRequest;',
    'import java.net.http.HttpResponse;',
    '',
    'String token = "your access_token";',
    '',
    'HttpRequest request = HttpRequest.newBuilder()',
    '        .uri(URI.create("' + url + '"))',
    '        .header("Authorization", "Bearer-" + token)',
  ]
  if (method === 'POST' && body) {
    const json = JSON.stringify(body).replace(/\\/g, '\\\\').replace(/"/g, '\\"')
    lines.push('        .header("Content-Type", "application/json")')
    lines.push('        .POST(HttpRequest.BodyPublishers.ofString("' + json + '"))')
    lines.push('        .build();')
  } else {
    lines.push('        .GET()')
    lines.push('        .build();')
  }
  lines.push('')
  lines.push('HttpResponse<String> response = HttpClient.newHttpClient()')
  lines.push('        .send(request, HttpResponse.BodyHandlers.ofString());')
  lines.push('System.out.println(response.body());')
  return lines.join('\n')
}

function jsValue (value, indent) {
  const pad = ' '.repeat(indent)
  if (value === null) return 'null'
  if (Array.isArray(value)) {
    if (!value.length) return '[]'
    const inner = value.map(v => jsValue(v, indent + 4)).map(s => pad + '    ' + s + ',')
    return '[\n' + inner.join('\n') + '\n' + pad + ']'
  }
  if (typeof value === 'object') {
    const keys = Object.keys(value)
    if (!keys.length) return '{}'
    const inner = keys.map(k => pad + "    '" + k + "': " + jsValue(value[k], indent + 4) + ',')
    return '{\n' + inner.join('\n') + '\n' + pad + '}'
  }
  return JSON.stringify(value)
}

function genNode (method, url, body) {
  const lines = [
    "const token = 'your access_token';",
    '',
    '(async () => {',
  ]
  if (method === 'POST' && body) {
    lines.push("    const response = await fetch('" + url + "', {")
    lines.push("        method: 'POST',")
    lines.push('        headers: {')
    lines.push("            'Authorization': 'Bearer-' + token,")
    lines.push("            'Content-Type': 'application/json'")
    lines.push('        },')
    lines.push('        body: JSON.stringify(' + jsValue(body, 8) + ')')
    lines.push('    });')
  } else {
    lines.push("    const response = await fetch('" + url + "', {")
    lines.push('        headers: {')
    lines.push("            'Authorization': 'Bearer-' + token")
    lines.push('        }')
    lines.push('    });')
  }
  lines.push('')
  lines.push('    const data = await response.json();')
  lines.push('    console.log(data);')
  lines.push('})();')
  return lines.join('\n')
}

function genGo (method, url, body) {
  const needStrings = method === 'POST' && body
  const imports = ['"fmt"', '"io"', '"net/http"']
  if (needStrings) imports.push('"strings"')
  imports.sort()

  const lines = [
    'package main',
    '',
    'import (',
    ...imports.map(i => '\t' + i),
    ')',
    '',
    'func main() {',
    '\ttoken := "your access_token"',
    '',
  ]
  if (needStrings) {
    const json = JSON.stringify(body)
    lines.push('\treq, _ := http.NewRequest("' + method + '", "' + url + '", strings.NewReader(`' + json + '`))')
  } else {
    lines.push('\treq, _ := http.NewRequest("' + method + '", "' + url + '", nil)')
  }
  lines.push('\treq.Header.Set("Authorization", "Bearer-"+token)')
  if (method === 'POST' && body) {
    lines.push('\treq.Header.Set("Content-Type", "application/json")')
  }
  lines.push('')
  lines.push('\tresp, err := http.DefaultClient.Do(req)')
  lines.push('\tif err != nil {')
  lines.push('\t\tpanic(err)')
  lines.push('\t}')
  lines.push('\tdefer resp.Body.Close()')
  lines.push('')
  lines.push('\tresult, _ := io.ReadAll(resp.Body)')
  lines.push('\tfmt.Println(string(result))')
  lines.push('}')
  return lines.join('\n')
}

const GENERATORS = {
  PHP: genPhp,
  Java: genJava,
  Node: genNode,
  Go: genGo,
}
const FENCE = { PHP: 'php', Java: 'java', Node: 'javascript', Go: 'go' }

function buildSection (method, url, body) {
  const fence = '```'
  const parts = ['### 请求示例', '', '<code-group>']
  LANGS.forEach((lang, index) => {
    const active = index === 0 ? ' active' : ''
    parts.push('<code-block title="' + lang + '"' + active + '>')
    parts.push('')
    parts.push(fence + FENCE[lang])
    parts.push(GENERATORS[lang](method, url, body))
    parts.push(fence)
    parts.push('')
    parts.push('</code-block>')
  })
  parts.push('</code-group>')
  return parts.join('\n')
}

// ---------- 主流程 ----------

// 支持命令行指定 md 文件路径;不传则扫描所有 */API/*.md
const cliFiles = process.argv.slice(2).map(f => path.resolve(f))
const pages = cliFiles.length ? cliFiles : walkApiPages(DOCS_DIR)
let updated = 0
const skipped = []

for (const file of pages) {
  const md = fs.readFileSync(file, 'utf8')
  const syntax = parseRequestSyntax(md)
  if (!syntax) {
    skipped.push(path.relative(DOCS_DIR, file) + ' (无请求语法)')
    continue
  }

  const { params, subTables } = parseParamTables(md)
  const { url, body } = buildRequestData(syntax.method, syntax.path, params, subTables)
  const section = buildSection(syntax.method, url, body)

  const marker = '### 请求示例'
  const idx = md.indexOf(marker)
  let next
  if (idx !== -1) {
    next = md.slice(0, idx).trimEnd() + '\n\n' + section + '\n'
  } else {
    next = md.trimEnd() + '\n\n' + section + '\n'
  }

  if (next !== md) {
    fs.writeFileSync(file, next, 'utf8')
    updated++
  }
}

console.log('updated pages: ' + updated)
if (skipped.length) {
  console.log('skipped:')
  skipped.forEach(s => console.log('  - ' + s))
}
