<template>
  <div
    class="relative footer-bg w-full px-2 py-2 text-center text-xs text-token-text-secondary empty:hidden md:px-[60px]"
  >
    <div class="min-h-4">
      <div>ChatGPT có thể mắc lỗi. Hãy kiểm tra các thông tin quan trọng.</div>
    </div>
  </div>
</template>

<style scoped>
.footer-bg {
  background: #212121;
}

@media (min-width: 768px) {
  .md\:px-\[60px\] {
    padding-left: 60px;
    padding-right: 60px;
  }
}

.text-token-text-secondary {
  color: #b4b4b4;
}

.text-xs {
  font-size: 0.75rem;
  line-height: 1rem;
}

.text-center {
  text-align: center;
}

.py-2 {
  padding-bottom: 0.5rem;
  padding-top: 0.5rem;
}

.px-2 {
  padding-left: 0.5rem;
  padding-right: 0.5rem;
}

.w-full {
  width: 100%;
}

.relative {
  position: relative;
}

.min-h-4 {
  min-height: 1rem;
}
</style>
