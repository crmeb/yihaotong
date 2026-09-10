// 给全站代码块注入"复制"按钮(默认主题 1.9 没有自带复制功能)
const COPY_TEXT = '复制'
const COPIED_TEXT = '已复制 ✓'
let copyTimer = null

function writeToClipboard (text) {
  if (navigator.clipboard && window.isSecureContext) {
    return navigator.clipboard.writeText(text)
  }
  // http 环境降级方案
  const textarea = document.createElement('textarea')
  textarea.value = text
  textarea.style.position = 'fixed'
  textarea.style.opacity = '0'
  document.body.appendChild(textarea)
  textarea.select()
  document.execCommand('copy')
  document.body.removeChild(textarea)
  return Promise.resolve()
}

function addCopyButtons () {
  document.querySelectorAll('div[class*="language-"]').forEach(el => {
    if (el.querySelector('.copy-code-btn')) {
      return
    }
    const pre = el.querySelector('pre')
    if (!pre) {
      return
    }
    const btn = document.createElement('button')
    btn.className = 'copy-code-btn'
    btn.textContent = COPY_TEXT
    btn.addEventListener('click', () => {
      writeToClipboard(pre.innerText).then(() => {
        btn.textContent = COPIED_TEXT
        setTimeout(() => {
          btn.textContent = COPY_TEXT
        }, 2000)
      })
    })
    el.appendChild(btn)
  })
}

export default ({ Vue, router, isServer }) => {
  if (isServer) {
    return
  }

  // 组件树挂载完成后统一注入,防抖避免每个组件 mounted 都扫一遍 DOM
  Vue.mixin({
    mounted () {
      clearTimeout(copyTimer)
      copyTimer = setTimeout(addCopyButtons, 30)
    }
  })

  if (router) {
    router.afterEach(() => {
      clearTimeout(copyTimer)
      copyTimer = setTimeout(addCopyButtons, 80)
    })
  }
}
