// 1) 删除全部「域名说明」提醒块; 2) 全量替换域名为 api.crmeb.net (幂等)
const fs = require('fs')
const path = require('path')

const DOCS = path.resolve(__dirname, '../docs')

function walkMd (dir) {
  const out = []
  for (const item of fs.readdirSync(dir, { withFileTypes: true })) {
    const full = path.join(dir, item.name)
    if (item.isDirectory()) {
      if (item.name === 'node_modules' || item.name === 'dist') continue
      out.push(...walkMd(full))
    } else if (item.name.endsWith('.md')) {
      out.push(full)
    }
  }
  return out
}

let removedBlocks = 0
let domainReplaced = 0

for (const file of walkMd(DOCS)) {
  let md = fs.readFileSync(file, 'utf8')
  const before = md

  // 删除「域名说明」提醒块: ::: warning 域名说明 ... ::: (含其后的空行)
  const blockRe = /::: warning 域名说明\n[\s\S]*?\n:::\n\n?/g
  md = md.replace(blockRe, () => {
    removedBlocks++
    return ''
  })

  // 域名替换
  md = md.replace(/sms\.crmeb\.net/g, () => {
    domainReplaced++
    return 'api.crmeb.net'
  })
  md = md.replace(/ai\.crmeb\.com/g, () => {
    domainReplaced++
    return 'api.crmeb.net'
  })

  if (md !== before) {
    fs.writeFileSync(file, md)
    console.log('updated:', path.relative(DOCS, file))
  }
}

console.log('---')
console.log('removed notice blocks:', removedBlocks)
console.log('domain replacements:', domainReplaced)
