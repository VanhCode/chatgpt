<template>
  <header class="header">
    <div class="logo">
      <span>ChatGPT</span>
      <i class="arrow-down"></i>
    </div>

    <div class="status">
      <span>Bộ nhớ đầy</span>
      <i class="info-icon">i</i>
    </div>

    <div class="actions">
      <button class="share-btn">Chia sẻ</button>
      <div class="avatar">
        <span>CH</span>
      </div>
    </div>
  </header>
</template>

<script>
export default {
  name: "HeaderComponent",
};
</script>

<style scoped>
.header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  background: #212121;
  color: white;
  padding: 10px 20px;
  border-bottom: 1px solid #343541;
  font-family: Arial, sans-serif;
  position: sticky;
  top: 0;
  left: 0;
  right: 0;
  width: 100%;
  z-index: 10;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  height: 60px;
}

.logo {
  display: flex;
  align-items: center;
  font-size: 18px;
  font-weight: bold;
  cursor: pointer;
}

.logo .arrow-down {
  margin-left: 5px;
  border: solid white;
  border-width: 0 2px 2px 0;
  display: inline-block;
  padding: 3px;
  transform: rotate(45deg);
}

.status {
  display: flex;
  align-items: center;
  gap: 5px;
  font-size: 14px;
}

.status .info-icon {
  font-size: 12px;
  background: #444654;
  border-radius: 50%;
  width: 16px;
  height: 16px;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
}

.actions {
  display: flex;
  align-items: center;
  gap: 15px;
}

.share-btn {
  background: transparent;
  color: white;
  border: 1px solid #444654;
  padding: 5px 10px;
  border-radius: 5px;
  cursor: pointer;
  transition: background 0.3s;
}

.share-btn:hover {
  background: #444654;
}

.avatar {
  background: #ffb400;
  color: #202123;
  width: 32px;
  height: 32px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-weight: bold;
  cursor: pointer;
}
</style>
