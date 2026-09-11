# AI 接口配置

本教程介绍如何在本机配置 AI 编程工具环境，包括 Node.js 运行时，以及 Codex、ZCode、Claude Code 三种 AI 工具的安装与接口配置。

::: tip 提示
后续的 Codex、ZCode、Claude Code 均依赖 Node.js 运行环境。请先完成 Node.js 安装教程，再继续各工具配置。
:::

## Node.js 环境安装

在 Windows、macOS、Linux 安装 Node.js LTS，并验证 node/npm 命令可用。

### Windows

**方法一：官方下载（推荐）**

前往 [Node.js 官网](https://nodejs.org) 下载 LTS 版本，双击安装包按提示安装即可。

**方法二：使用 Chocolatey**

```powershell
choco install nodejs-lts
```

**方法三：使用 Scoop**

```powershell
scoop install nodejs-lts
```

### macOS

**方法一：使用 Homebrew（推荐）**

```bash
brew install node
```

**方法二：官方下载**

前往 [Node.js 官网](https://nodejs.org) 下载 macOS 安装包。

### Linux

**Ubuntu / Debian：**

```bash
curl -fsSL https://deb.nodesource.com/setup_lts.x | sudo -E bash -
sudo apt-get install -y nodejs
```

**CentOS / RHEL：**

```bash
curl -fsSL https://rpm.nodesource.com/setup_lts.x | sudo bash -
sudo yum install -y nodejs
```

### 验证安装

安装完成后，在终端执行：

```bash
node --version
npm --version
```

如果能输出版本号，说明 Node.js 与 npm 已可用。

---

## Codex 配置

Codex 是 OpenAI 推出的 AI 编程助手，通过 npm 全局安装，依赖 Node.js 环境。

### 安装 Codex

```bash
npm install -g @openai/codex
```

### 配置接口

Codex 通过环境变量指定接口地址、密钥与模型。在终端执行：

```bash
export OPENAI_API_KEY=your_api_key
export OPENAI_BASE_URL=https://ai.crmeb.com/v1
export OPENAI_MODEL=your-model-name
```

| 变量 | 说明 |
|---|---|
| OPENAI_API_KEY | 接口鉴权密钥 |
| OPENAI_BASE_URL | 接口地址，OpenAI 兼容格式，以 /v1 结尾 |
| OPENAI_MODEL | 使用的模型名称 |

### 验证 Codex

```bash
codex --version
codex exec "你好，请介绍一下你自己"
```

能正常返回模型输出即配置成功。

---

## ZCode 配置

ZCode 是交互式 AI 编程助手，通过 npm 全局安装，依赖 Node.js 环境。

### 安装 ZCode

```bash
npm install -g zcode
```

### 配置接口

ZCode 使用配置文件指定接口，配置文件位于 `~/.zcode/config.json`：

```json
{
  "provider": "custom",
  "baseUrl": "https://ai.crmeb.com/v1",
  "apiKey": "your_api_key",
  "model": "your-model-name"
}
```

| 字段 | 说明 |
|---|---|
| provider | 服务商类型，使用自建网关时填 custom |
| baseUrl | 接口地址，OpenAI 兼容格式，以 /v1 结尾 |
| apiKey | 接口鉴权密钥 |
| model | 使用的模型名称 |

### 验证 ZCode

```bash
zcode --version
```

启动后输入一句对话，能正常回复即配置成功。

---

## Claude Code 配置

Claude Code 是 Anthropic 推出的 AI 编程助手，通过 npm 全局安装，依赖 Node.js 环境。

### 安装 Claude Code

```bash
npm install -g @anthropic-ai/claude-code
```

### 配置接口

Claude Code 通过环境变量指定接口地址、密钥与模型。在终端执行：

```bash
export ANTHROPIC_BASE_URL=https://ai.crmeb.com/v1
export ANTHROPIC_AUTH_TOKEN=your_api_key
export ANTHROPIC_MODEL=your-model-name
```

| 变量 | 说明 |
|---|---|
| ANTHROPIC_BASE_URL | 接口地址，Anthropic 兼容格式 |
| ANTHROPIC_AUTH_TOKEN | 接口鉴权密钥 |
| ANTHROPIC_MODEL | 使用的模型名称 |

### 验证 Claude Code

```bash
claude --version
claude "你好，请介绍一下你自己"
```

能正常返回模型输出即配置成功。

---

::: warning 注意
- 各工具的接口地址统一为 `https://ai.crmeb.com/v1`，密钥与模型名称以你实际开通的服务为准
- 环境变量配置仅在当前终端会话生效，如需永久生效请写入 `~/.bashrc` 或 `~/.zshrc`
- 更换接口配置后需要重启工具进程才能生效
:::
