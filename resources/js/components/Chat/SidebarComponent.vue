<template>
  <div class="sidebar">
    <div class="logo">ChatGPT</div>
    <ul class="chat-history">
      <li v-for="(chat, index) in chats" :key="index" class="chat-item">
        {{ chat.title }}
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  name: "SidebarComponent",
  data() {
    return {
      chats: [
        { title: "Hôm nay" },
        { title: "7 ngày trước" },
        { title: "30 ngày trước" },
      ],
    };
  },
};
</script>

<style scoped>
.sidebar {
  background: #171717;
  color: white;
  width: 250px;
  height: 100vh;
  padding: 20px;
  display: flex;
  flex-direction: column;
  gap: 20px;
}
.logo {
  font-size: 24px;
  font-weight: bold;
}
.chat-history {
  list-style: none;
  padding: 0;
}
.chat-item {
  font-size: 12px;
  padding: 10px;
  border-radius: 5px;
  cursor: pointer;
  transition: background 0.3s;
}
.chat-item:hover {
  background: #343541;
}
</style>
