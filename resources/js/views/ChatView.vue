<template>
  <div class="chat-view">
    <SidebarComponent />
    <div class="main-content">
      <HeaderComponent />
      <div v-if="messages.length <= 1" class="welcome-section">
        <h1 class="welcome-text">Tôi có thể giúp gì cho bạn?</h1>
        <MessageInputComponent @send="sendMessage" />
        <div class="action-buttons">
          <button class="action-btn">Tạo hình ảnh</button>
          <button class="action-btn">Giúp tôi viết</button>
          <button class="action-btn">Phân tích hình ảnh</button>
          <button class="action-btn">Tóm tắt văn bản</button>
          <button class="action-btn">Thêm</button>
        </div>
      </div>

      <div class="chat-box" v-else>
        <div class="overflow-y-scroll">
          <ChatBoxComponent :messages="messages" />
        </div>
        <div class="input-footer">
          <MessageInputComponent @send="sendMessage" />
          <FooterComponent />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import SidebarComponent from "../components/Chat/SidebarComponent.vue";
import HeaderComponent from "../components/Header/HeaderComponent.vue";
import ChatBoxComponent from "../components/Chat/ChatBoxComponent.vue";
import MessageInputComponent from "../components/Chat/MessageInputComponent.vue";
import FooterComponent from "../components/Footer/FooterComponent.vue";

export default {
  name: "ChatView",
  components: {
    SidebarComponent,
    HeaderComponent,
    ChatBoxComponent,
    MessageInputComponent,
    FooterComponent,
  },
  data() {
    return {
      messages: [],
      userMessage: "",
      htmlContent: "",
    };
  },
  methods: {
    async sendMessage(content) {
      if (!content.trim()) return;

      this.messages.push({
        type: "user",
        content: content.trim(),
      });

      const tempMessage = {
        type: "assistant",
        content: `<div style="width: 17px !important; height: 17px; border-radius: 50%; background-color: #fff;" class='dot-chat'></div>`,
      };

      this.messages.push(tempMessage);

      const tempIndex = this.messages.length - 1;

      this.$nextTick(async () => {
        try {
          const response = await axios.post("/api/generate", { prompt: content.trim() });

          if (response.status === 201 && response.data.response) {
            const responseText = response.data.response;
            this.messages[tempIndex] = {
              type: "assistant",
              content: responseText,
            };
          } else {
            this.messages[tempIndex] = {
              type: "assistant",
              content: "Không nhận được phản hồi từ máy chủ.",
            };
          }
        } catch (error) {
          console.error("API Error:", error);
          this.messages[tempIndex] = {
            type: "assistant",
            content: "Có lỗi xảy ra, vui lòng thử lại sau.",
          };
        }
      });
    },
    typeMessage(responseText, tempIndex) {
      let currentText = "";
      let i = 0;

      const interval = setInterval(() => {
        if (i < responseText.length) {
          currentText += responseText.charAt(i);
          this.messages[tempIndex].content = currentText;
          i++;
        } else {
          clearInterval(interval);
        }
      }, 10);
    },
    setHTMLContent(content) {
      this.htmlContent = content;
    },
  },
};
</script>

<style scoped>
.chat-view {
  display: flex;
  height: 100vh;
  background: #202123;
  color: white;
}

.main-content {
  display: flex;
  flex-direction: column;
  flex: 1;
  background: #212121;
  overflow: hidden;
  max-width: 100%;
}

.overflow-y-scroll {
  flex: 1;
  overflow-y: auto;
  padding: 10px;
}

.welcome-section {
  text-align: center;
  margin: auto;
}

.welcome-text {
  font-size: 24px;
  margin-bottom: 20px;
  color: white;
}

.chat-input {
  display: flex;
  justify-content: center;
  margin-top: 20px;
  gap: 10px;
}

.input-box {
  width: 60%;
  padding: 10px;
  border-radius: 5px;
  border: none;
  outline: none;
}

.send-button {
  padding: 10px 20px;
  background: #007bff;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

.send-button:hover {
  background: #0056b3;
}

.action-buttons {
  margin-top: 20px;
}

.action-btn {
  margin: 5px;
  padding: 10px 20px;
  background: #2f2f2f;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

.action-btn:hover {
  background: #555761;
}

.chat-box {
  display: flex;
  flex-direction: column;
  flex: 1;
  overflow: hidden;
}

.input-footer {
  padding: 0 100px;
}
</style>
