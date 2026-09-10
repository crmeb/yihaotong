<template>
  <section class="home-hero">
    <div class="hero-main">
      <h1 class="hero-title">一号通，<span class="hero-grad">让开发更简单</span></h1>
      <p class="hero-tagline">提供专业API服务，让企业商城运营更简单</p>
      <div class="hero-actions">
        <div class="composer-box">
          <span class="composer-dollar">$</span>
          <code class="composer-cmd">composer require crmeb/yihaotong</code>
          <button class="copy-btn" @click="copyCommand">{{ copied ? '已复制 ✓' : '复制' }}</button>
        </div>
        <router-link class="start-btn" to="/快速入门/">立即开始 →</router-link>
      </div>
      <div class="hero-features">
        <div class="feature-card" v-for="item in features" :key="item.title">
          <h3>{{ item.title }}</h3>
          <p>{{ item.details }}</p>
        </div>
      </div>
    </div>
    <footer class="home-footer">
      Copyright © 2016~2026
      <a href="https://www.crmeb.com" target="_blank" rel="noopener noreferrer">CRMEB</a>
      All rights reserved.
    </footer>
  </section>
</template>

<script>
export default {
  name: 'HomeHero',
  data() {
    return {
      copied: false,
      copyTimer: null,
      contentEl: null,
      contentBackup: '',
      command: 'composer require crmeb/yihaotong',
      features: [
        {
          title: '对接简单',
          details: '标准接口规范、文档齐全，注册后无需认证即可使用，对接方便快捷；'
        },
        {
          title: '多种服务',
          details: '内置短信、物流查询、面单打印、商家寄件、商品采集、发票开具、电子签、条形码查询等多种服务；'
        },
        {
          title: '多应用',
          details: '一个账号支持创建多个应用，独立密钥管理，满足多系统、多服务的使用场景。'
        }
      ]
    }
  },
  methods: {
    copyCommand() {
      const done = () => {
        this.copied = true
        clearTimeout(this.copyTimer)
        this.copyTimer = setTimeout(() => {
          this.copied = false
        }, 2000)
      }

      if (navigator.clipboard && window.isSecureContext) {
        navigator.clipboard.writeText(this.command).then(done)
        return
      }

      const input = document.createElement('textarea')
      input.value = this.command
      input.style.position = 'fixed'
      input.style.opacity = '0'
      document.body.appendChild(input)
      input.select()
      document.execCommand('copy')
      document.body.removeChild(input)
      done()
    },

    // 首页 hero 需要通栏展示,挂载时去掉内容容器的限宽与内边距,离开时还原
    // palette.styl 中带 !important 的限宽规则优先级高于普通内联样式,这里同样以 !important 覆盖
    stretchContent() {
      const content = this.$el.closest('.theme-default-content')
      if (!content) {
        return
      }
      this.contentEl = content
      this.contentBackup = content.getAttribute('style')
      content.style.setProperty('max-width', 'none', 'important')
      content.style.setProperty('width', '100%', 'important')
      content.style.setProperty('margin', '0', 'important')
      content.style.setProperty('padding', '0', 'important')
    }
  },

  mounted() {
    this.stretchContent()
    document.body.classList.add('yht-home-page')
  },

  beforeDestroy() {
    clearTimeout(this.copyTimer)
    document.body.classList.remove('yht-home-page')
    if (this.contentEl) {
      if (this.contentBackup) {
        this.contentEl.setAttribute('style', this.contentBackup)
      } else {
        this.contentEl.removeAttribute('style')
      }
    }
  }
}
</script>

<style scoped>
.home-hero,
.home-hero *,
.home-hero *::before,
.home-hero *::after {
  box-sizing: border-box;
}

.home-hero {
  display: flex;
  flex-direction: column;
  width: 100%;
  margin-top: 0;
  min-height: 100vh;
}

/* 主题默认给内容第一个子元素加 margin-top: 3.6rem 为固定导航让位,
   首页导航是透明通栏的,这里用更高优先级选择器归零,避免把整页推下来露出白底 */
.theme-default-content > .home-hero:first-child {
  margin-top: 0;
}

.hero-main {
  flex: 1;
  width: 100%;
  max-width: 1000px;
  margin: 0 auto;
  padding: 5rem 2rem 3rem;
  text-align: center;
}

.hero-title {
  margin-bottom: 1.5rem;
  font-size: 3.4rem;
  font-weight: 700;
  color: #1e6fd9;
}

.hero-grad {
  background: linear-gradient(90deg, #1f7ae0 0%, #45c0ff 100%);
  -webkit-background-clip: text;
  background-clip: text;
  -webkit-text-fill-color: transparent;
}

.hero-tagline {
  margin-bottom: 3rem;
  font-size: 1.25rem;
  color: #4b6a8f;
}

.hero-actions {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 14px;
  margin-bottom: 4.5rem;
}

.composer-box {
  display: flex;
  align-items: center;
  padding: 10px 14px;
  background: #fff;
  border: 1px solid #d7e7f9;
  border-radius: 8px;
  box-shadow: 0 4px 14px rgba(31, 122, 224, 0.08);
}

.composer-dollar {
  margin-right: 8px;
  color: #9ab6d4;
  font-family: source-code-pro, Menlo, Consolas, Monaco, monospace;
}

.composer-cmd {
  font-family: source-code-pro, Menlo, Consolas, Monaco, monospace;
  font-size: 0.95rem;
  color: #2c3e50;
}

.copy-btn {
  margin-left: 14px;
  padding: 3px 10px;
  font-size: 0.82rem;
  color: #1f7ae0;
  background: #eaf4ff;
  border: 1px solid #cfe5fb;
  border-radius: 6px;
  cursor: pointer;
  white-space: nowrap;
  flex-shrink: 0;
  transition: all 0.2s;
}

.copy-btn:hover {
  background: #dcecfd;
}

.start-btn {
  display: inline-block;
  padding: 13px 24px;
  font-size: 1rem;
  font-weight: 500;
  color: #fff !important;
  background: linear-gradient(90deg, #2f8bf0 0%, #5db4ff 100%);
  border-radius: 8px;
  box-shadow: 0 6px 16px rgba(47, 139, 240, 0.35);
  transition: all 0.2s;
}

.start-btn:hover {
  transform: translateY(-1px);
  box-shadow: 0 8px 20px rgba(47, 139, 240, 0.45);
}

.hero-features {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 20px;
  text-align: left;
}

.feature-card {
  padding: 22px 20px;
  background: rgba(255, 255, 255, 0.72);
  border: 1px solid #e0edfb;
  border-radius: 10px;
  transition: all 0.2s;
}

.feature-card:hover {
  transform: translateY(-3px);
  box-shadow: 0 10px 24px rgba(31, 122, 224, 0.12);
}

.feature-card h3 {
  margin-bottom: 0.6rem;
  font-size: 1.1rem;
  color: #1f7ae0;
}

.feature-card p {
  margin: 0;
  font-size: 0.92rem;
  line-height: 1.7;
  color: #5a7396;
}

.home-footer {
  padding: 1.2rem 1.5rem;
  font-size: 0.88rem;
  color: #7d95b3;
  text-align: center;
}

.home-footer a {
  color: #1f7ae0;
}

@media (max-width: 768px) {
  .hero-main {
    padding: 3.5rem 1rem 2.5rem;
  }

  .hero-title {
    font-size: 2rem;
  }

  .hero-tagline {
    font-size: 1.05rem;
  }

  .hero-actions {
    flex-direction: column;
  }

  .composer-box {
    max-width: 100%;
    overflow-x: auto;
  }

  .composer-cmd {
    font-size: 0.72rem;
    white-space: nowrap;
  }

  .copy-btn {
    margin-left: 10px;
    padding: 3px 8px;
    font-size: 0.75rem;
  }

  .hero-features {
    grid-template-columns: 1fr;
  }
}
</style>

<style>
/* 首页隐藏底部"更新时间"(该版本主题不读 frontmatter.lastUpdated,只能按页面隐藏) */
body.yht-home-page .page-edit {
  display: none;
}

/* 首页整页蓝色渐变背景 */
body.yht-home-page {
  background-color: #eaf5ff;
  background-image: linear-gradient(160deg, #aed3ff 0%, #d3e9ff 48%, #eef8ff 100%);
  background-attachment: fixed;
}

/* 导航栏融入渐变背景(去掉毛玻璃滤镜,保证与内容区颜色一致),
   内容限制在 1376px 内左右居中;中小屏幕自动回落为 1.5rem 边距 */
body.yht-home-page .navbar {
  background: transparent;
  border-bottom: none;
  box-shadow: none;
  backdrop-filter: none;
  -webkit-backdrop-filter: none;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding-left: max(1.5rem, calc((100% - 1376px) / 2));
  padding-right: max(1.5rem, calc((100% - 1376px) / 2));
}

body.yht-home-page .navbar .links {
  position: static;
  background-color: transparent;
  padding-left: 0;
}

@media (max-width: 719px) {
  body.yht-home-page .navbar {
    padding-left: 4rem;
    padding-right: 1.5rem;
  }
}
</style>
