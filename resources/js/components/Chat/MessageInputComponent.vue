<template>
  <div class="message-input">
    <div class="w-full">
      <div class="flex justify-center"></div>
      <div class="relative flex h-full max-w-full flex-1 flex-col">
        <div class="group relative flex w-full items-center">
          <div class="w-full">
            <div
              id="composer-background"
              class="flex w-full cursor-text flex-col rounded-3xl px-2.5 py-1 transition-colors contain-inline-size bg-[#f4f4f4] dark:bg-token-main-surface-secondary"
              style="view-transition-name: var(--vt-composer)"
            >
              <div class="flex min-h-[44px] items-start pl-2">
                <div class="min-w-0 max-w-full flex-1">
                  <div
                    class="_prosemirror-parent_cy42l_1 text-token-text-primary max-h-[25dvh] max-h-52 overflow-auto default-browser"
                  >
                    <div
                      contenteditable="true"
                      translate="no"
                      class="ProseMirror"
                      id="prompt-textarea"
                      data-virtualkeyboard="true"
                      data-placeholder="Tin nhắn ChatGPT"
                      :class="{ empty: !inputContent }"
                      @focus="handleFocus"
                      @blur="handleBlur"
                      @input="handleInput"
                      ref="textarea"
                    ></div>
                  </div>
                </div>
                <div class="w-[32px] pt-1">
                  <span
                    aria-hidden="true"
                    class="pointer-events-none invisible fixed left-0 top-0 block"
                    >O</span
                  >
                </div>
              </div>
              <div class="flex h-[44px] items-center justify-between">
                <div class="flex gap-x-1 text-token-text-primary">
                  <div
                    style="view-transition-name: var(--vt-composer-attach-file-action)"
                  >
                    <div class="relative">
                      <div class="relative">
                        <div class="flex flex-col">
                          <input
                            multiple=""
                            tabindex="-1"
                            class="hidden"
                            type="file"
                            style="display: none"
                          /><span class="hidden"></span
                          ><button
                            type="button"
                            id="radix-:r15:"
                            aria-haspopup="menu"
                            aria-expanded="false"
                            data-state="closed"
                            class="text-token-text-primary border border-transparent inline-flex items-center justify-center gap-1 rounded-lg text-sm dark:transparent dark:bg-transparent leading-none outline-none cursor-pointer hover:bg-token-main-surface-secondary dark:hover:bg-token-main-surface-secondary focus-visible:bg-token-main-surface-secondary radix-state-active:text-token-text-secondary radix-disabled:cursor-auto radix-disabled:bg-transparent radix-disabled:text-token-text-tertiary dark:radix-disabled:bg-transparent m-0 h-0 w-0 border-none bg-transparent p-0"
                          ></button>
                          <div class="h-8">
                            <button
                              disabled=""
                              aria-disabled="true"
                              aria-label="Đính kèm tệp không khả dụng"
                              data-state="closed"
                              class="flex items-center justify-center h-8 w-8 rounded-lg rounded-bl-xl text-token-text-primary dark:text-white focus-visible:outline-black dark:focus-visible:outline-white opacity-30"
                            >
                              <svg
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                              >
                                <path
                                  fill-rule="evenodd"
                                  clip-rule="evenodd"
                                  d="M9 7C9 4.23858 11.2386 2 14 2C16.7614 2 19 4.23858 19 7V15C19 18.866 15.866 22 12 22C8.13401 22 5 18.866 5 15V9C5 8.44772 5.44772 8 6 8C6.55228 8 7 8.44772 7 9V15C7 17.7614 9.23858 20 12 20C14.7614 20 17 17.7614 17 15V7C17 5.34315 15.6569 4 14 4C12.3431 4 11 5.34315 11 7V15C11 15.5523 11.4477 16 12 16C12.5523 16 13 15.5523 13 15V9C13 8.44772 13.4477 8 14 8C14.5523 8 15 8.44772 15 9V15C15 16.6569 13.6569 18 12 18C10.3431 18 9 16.6569 9 15V7Z"
                                  fill="currentColor"
                                ></path>
                              </svg>
                            </button>
                          </div>
                          <div
                            type="button"
                            aria-haspopup="dialog"
                            aria-expanded="false"
                            aria-controls="radix-:r18:"
                            data-state="closed"
                          ></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div
                    style="view-transition-name: var(--vt-composer-system-hint-action)"
                  >
                    <span class="hidden"></span
                    ><span class="" data-state="closed"
                      ><button
                        type="button"
                        id="radix-:r1q:"
                        aria-haspopup="menu"
                        aria-expanded="false"
                        data-state="closed"
                        class="_toolsButton_d2h2h_8 flex h-8 min-w-8 items-center justify-center rounded-lg p-1 text-xs font-semibold hover:bg-black/10 focus-visible:outline-black disabled:opacity-30 dark:focus-visible:outline-white"
                        aria-label="Sử dụng một công cụ"
                      >
                        <svg
                          width="24"
                          height="24"
                          viewBox="0 0 24 24"
                          fill="none"
                          overflow="visible"
                          xmlns="http://www.w3.org/2000/svg"
                          class="pointer-events-none"
                        >
                          <mask id="stuff-part-box-fill">
                            <path d="M-6 -10H30V11H-6Z" fill="white"></path>
                            <path
                              d="M20 11H4V19C4 20.1 4.9 21 6 21H18C19.1 21 20 20.1 20 19V11Z"
                              fill="black"
                            ></path>
                          </mask>
                          <mask id="stuff-part-star-fill">
                            <path d="M-6 -6H30V11H-6Z" fill="white"></path>
                            <path
                              class="stuff-part-star"
                              d="M8.05625 3.61554C8.30853 2.89184 9.2477 2.70929 9.75272 3.28578L11.2938 5.04497C11.4788 5.25615 11.744 5.37984 12.0247 5.38581L14.3629 5.43554C15.1291 5.45184 15.593 6.28864 15.2008 6.94708L14.0039 8.95633C13.8602 9.19753 13.8245 9.48802 13.9056 9.75682L14.5808 11.9959C14.8021 12.7297 14.1496 13.4294 13.4022 13.2599L11.1214 12.7425C10.8476 12.6804 10.5603 12.7362 10.3297 12.8964L8.40888 14.2305C7.7794 14.6677 6.91229 14.2633 6.84258 13.5001L6.62986 11.1711C6.60432 10.8915 6.46243 10.6355 6.23886 10.4657L4.37646 9.05111C3.76614 8.58754 3.88274 7.63792 4.58708 7.33577L6.73638 6.41376C6.99439 6.30307 7.19399 6.08903 7.28641 5.82392L8.05625 3.61554Z"
                              fill="black"
                            ></path>
                          </mask>
                          <g mask="url(#stuff-part-box-fill)">
                            <g mask="url(#stuff-part-star-fill)">
                              <path
                                class="stuff-part-pen"
                                fill-rule="evenodd"
                                clip-rule="evenodd"
                                d="M14.1356 3.327C14.6861 2.06081 16.1589 1.48067 17.4251 2.03123L19.4885 2.92841C20.7547 3.47897 21.3348 4.95174 20.7842 6.21793L17.8342 13.0027C17.663 13.3963 17.3934 13.7392 17.0513 13.9984L13.054 17.026L12.4501 16.2289L11.4544 16.3212L11.3505 15.2023C11.295 14.6055 11.2326 13.9364 11.2047 13.6425L10.987 11.3504C10.947 10.9294 11.0145 10.505 11.1831 10.1172L14.1356 3.327ZM12.4501 16.2289L11.4544 16.3212C11.4879 16.6826 11.7146 16.9975 12.0468 17.1439C12.3789 17.2903 12.7646 17.245 13.054 17.026L12.4501 16.2289ZM13.2795 14.3467L15.8435 12.4043C15.9119 12.3525 15.9658 12.2839 16 12.2052L18.9501 5.42044C19.0602 5.1672 18.9442 4.87264 18.691 4.76253L16.6276 3.86535C16.3743 3.75524 16.0798 3.87126 15.9697 4.1245L13.0172 10.9147C12.9835 10.9922 12.97 11.0771 12.978 11.1613L13.1957 13.4533C13.2135 13.6399 13.2448 13.9752 13.2795 14.3467Z"
                                fill="currentColor"
                              ></path>
                            </g>
                            <path
                              class="stuff-part-star"
                              fill-rule="evenodd"
                              clip-rule="evenodd"
                              d="M7.11197 3.28637C7.61654 1.83896 9.49489 1.47385 10.5049 2.62685L12.046 4.38603L14.3842 4.43577C15.9166 4.46836 16.8443 6.14195 16.0599 7.45885L14.863 9.4681L15.5382 11.7072C15.9808 13.1748 14.6758 14.5742 13.181 14.2351L10.9002 13.7177L8.97932 15.0518C7.72036 15.9262 5.98614 15.1175 5.84672 13.5911L5.634 11.262L3.7716 9.84744C2.55096 8.9203 2.78416 7.02106 4.19284 6.41676L6.34213 5.49475L7.11197 3.28637ZM10.5416 5.7039L9.00051 3.94471L8.23067 6.15309C8.04584 6.6833 7.64664 7.1114 7.13061 7.33276L4.98132 8.25478L6.84371 9.66936C7.29086 10.009 7.57464 10.5209 7.62571 11.0801L7.83843 13.4091L9.75929 12.075C10.2205 11.7547 10.7951 11.643 11.3427 11.7673L13.6234 12.2847L12.9482 10.0455C12.7861 9.50795 12.8574 8.92697 13.1448 8.44457L14.3416 6.43532L12.0034 6.38558C11.4421 6.37364 10.9116 6.12626 10.5416 5.7039Z"
                              fill="currentColor"
                            ></path>
                            <g class="stuff-part-jack">
                              <path
                                fill-rule="evenodd"
                                clip-rule="evenodd"
                                d="M11.4873 26.067C11.5514 26.0445 11.6198 26.0217 11.6925 25.9988L11.0922 24.091C10.6826 24.2199 10.239 24.3899 9.87818 24.6169C9.58085 24.804 9 25.243 9 26C9 26.7396 9.49534 27.2202 9.86829 27.4784C9.87463 27.4828 9.88099 27.4872 9.88737 27.4915C9.86663 27.5058 9.84613 27.5203 9.82589 27.535C9.45161 27.8072 9 28.2875 9 29C9 29.7396 9.49534 30.2202 9.86829 30.4784C9.90016 30.5005 9.93264 30.522 9.96568 30.5431C9.93938 30.5594 9.91347 30.5759 9.888 30.5926C9.70054 30.7159 9.49716 30.8773 9.33217 31.0864C9.16471 31.2986 9 31.6092 9 32C9 32.3908 9.16471 32.7014 9.33217 32.9136C9.49716 33.1227 9.70054 33.2841 9.888 33.4074C10.263 33.654 10.7308 33.8492 11.1866 33.9996C12.0976 34.3003 13.2047 34.5 14 34.5V32.5C13.462 32.5 12.569 32.3497 11.8134 32.1004C11.7126 32.0671 11.6187 32.0335 11.5319 32C11.6187 31.9665 11.7126 31.9329 11.8134 31.8996C12.569 31.6503 13.462 31.5 14 31.5C14.5523 31.5 15 31.0523 15 30.5C15 29.9477 14.5523 29.5 14 29.5C13.4254 29.5 12.5226 29.3877 11.7873 29.1672C11.5941 29.1092 11.4306 29.049 11.2974 28.9903C11.4159 28.9376 11.5604 28.8834 11.7316 28.8308C12.4366 28.6139 13.336 28.5 14 28.5C14.5523 28.5 15 28.0523 15 27.5C15 26.9477 14.5523 26.5 14 26.5C13.4254 26.5 12.5226 26.3877 11.7873 26.1672C11.6777 26.1343 11.5776 26.1007 11.4873 26.067Z"
                                fill="currentColor"
                              ></path>
                              <path
                                fill-rule="evenodd"
                                clip-rule="evenodd"
                                d="M13.5 10.382V12C13.5 12.5167 13.5053 13.1354 13.6523 13.6744C13.7561 14.0553 13.8996 14.2919 14.0859 14.4317C14.8816 14.222 15.8088 14.1322 16.7039 14.2601C17.7583 14.4107 18.8748 14.8844 19.582 15.9453L20.3759 17.1361L18.9847 17.4721C18.5941 17.5664 18.3944 17.6948 18.2874 17.7953C18.1845 17.8918 18.1122 18.0138 18.0619 18.1945C18.0076 18.3896 17.9843 18.6347 17.9822 18.955C17.9812 19.1127 17.9852 19.2749 17.9899 19.452L17.9909 19.4879C17.9952 19.6499 18 19.8262 18 20C18 23.3137 15.3137 26 12 26C8.6863 26 6.00001 23.3137 6.00001 20C6.00001 19.8108 6.00384 19.6603 6.00738 19.5217C6.01201 19.3399 6.01612 19.1786 6.01036 18.9771C6.00164 18.6724 5.96752 18.4502 5.90286 18.2781C5.84523 18.1246 5.75703 17.9926 5.5915 17.8702C5.4129 17.7381 5.10246 17.5873 4.55908 17.4816L3.12725 17.2031L3.90325 15.968C4.95025 14.3016 6.56507 13.9881 7.77695 14.0645C8.18753 14.0904 8.56505 14.1599 8.88234 14.2391C9.66993 12.4933 11.119 11.5725 12.0528 11.1056L13.5 10.382ZM6.65071 16.1709C6.69502 16.2004 6.73833 16.2308 6.78066 16.2621C7.27801 16.6299 7.59164 17.0862 7.77518 17.5749C7.95168 18.0449 7.99806 18.5188 8.00954 18.9199C8.01605 19.1476 8.01011 19.4317 8.00512 19.6699C8.00242 19.7989 8.00001 19.9143 8.00001 20C8.00001 22.2091 9.79087 24 12 24C14.2091 24 16 22.2091 16 20C16 19.8543 15.996 19.7036 15.9914 19.5349L15.9906 19.5057C15.9859 19.3305 15.981 19.1373 15.9823 18.9421C15.9848 18.5565 16.0107 18.1055 16.1351 17.6584C16.2623 17.2011 16.495 16.739 16.9075 16.3475C16.7574 16.3007 16.5951 16.2648 16.4211 16.2399C15.7217 16.14 14.9416 16.2402 14.3162 16.4487C14.111 16.5171 13.889 16.5171 13.6838 16.4487C12.4861 16.0495 11.9545 15.0504 11.7227 14.2006C11.6855 14.064 11.6545 13.9262 11.6286 13.7891C11.1253 14.2598 10.6832 14.8905 10.4701 15.7425C10.3975 16.0329 10.1987 16.2755 9.92819 16.4037C9.65885 16.5313 9.34669 16.5321 9.07678 16.406Z  M11 19.5C11 20.0523 10.6642 20.5 10.25 20.5C9.83579 20.5 9.5 20.0523 9.5 19.5C9.5 18.9477 9.83579 18.5 10.25 18.5C10.6642 18.5 11 18.9477 11 19.5Z M14.5 19.5C14.5 20.0523 14.1642 20.5 13.75 20.5C13.3358 20.5 13 20.0523 13 19.5C13 18.9477 13.3358 18.5 13.75 18.5C14.1642 18.5 14.5 18.9477 14.5 19.5Z"
                                fill="currentColor"
                              ></path>
                            </g>
                          </g>
                          <path
                            fill-rule="evenodd"
                            clip-rule="evenodd"
                            d="M3 11C3 10.4477 3.44772 10 4 10H20C20.5523 10 21 10.4477 21 11V19C21 20.6523 19.6523 22 18 22H6C4.34772 22 3 20.6523 3 19V11ZM5 12V19C5 19.5477 5.45228 20 6 20H18C18.5477 20 19 19.5477 19 19V12H5ZM9.5 14.5C9.5 13.9477 9.94772 13.5 10.5 13.5H13.5C14.0523 13.5 14.5 13.9477 14.5 14.5C14.5 15.0523 14.0523 15.5 13.5 15.5H10.5C9.94772 15.5 9.5 15.0523 9.5 14.5Z"
                            fill="currentColor"
                          ></path>
                        </svg></button
                    ></span>
                  </div>
                  <div style="view-transition-name: var(--vt-composer-search-action)">
                    <div>
                      <span class="" data-state="closed"
                        ><button
                          class="flex h-8 min-w-8 items-center justify-center rounded-lg p-1 text-xs font-semibold hover:bg-black/10 focus-visible:outline-black dark:focus-visible:outline-white"
                          aria-pressed="false"
                          aria-label="Tìm kiếm web"
                        >
                          <svg
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                          >
                            <path
                              fill-rule="evenodd"
                              clip-rule="evenodd"
                              d="M2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12ZM11.9851 4.00291C11.9933 4.00046 11.9982 4.00006 11.9996 4C12.001 4.00006 12.0067 4.00046 12.0149 4.00291C12.0256 4.00615 12.047 4.01416 12.079 4.03356C12.2092 4.11248 12.4258 4.32444 12.675 4.77696C12.9161 5.21453 13.1479 5.8046 13.3486 6.53263C13.6852 7.75315 13.9156 9.29169 13.981 11H10.019C10.0844 9.29169 10.3148 7.75315 10.6514 6.53263C10.8521 5.8046 11.0839 5.21453 11.325 4.77696C11.5742 4.32444 11.7908 4.11248 11.921 4.03356C11.953 4.01416 11.9744 4.00615 11.9851 4.00291ZM8.01766 11C8.08396 9.13314 8.33431 7.41167 8.72334 6.00094C8.87366 5.45584 9.04762 4.94639 9.24523 4.48694C6.48462 5.49946 4.43722 7.9901 4.06189 11H8.01766ZM4.06189 13H8.01766C8.09487 15.1737 8.42177 17.1555 8.93 18.6802C9.02641 18.9694 9.13134 19.2483 9.24522 19.5131C6.48461 18.5005 4.43722 16.0099 4.06189 13ZM10.019 13H13.981C13.9045 14.9972 13.6027 16.7574 13.1726 18.0477C12.9206 18.8038 12.6425 19.3436 12.3823 19.6737C12.2545 19.8359 12.1506 19.9225 12.0814 19.9649C12.0485 19.9852 12.0264 19.9935 12.0153 19.9969C12.0049 20.0001 11.9999 20 11.9999 20C11.9999 20 11.9948 20 11.9847 19.9969C11.9736 19.9935 11.9515 19.9852 11.9186 19.9649C11.8494 19.9225 11.7455 19.8359 11.6177 19.6737C11.3575 19.3436 11.0794 18.8038 10.8274 18.0477C10.3973 16.7574 10.0955 14.9972 10.019 13ZM15.9823 13C15.9051 15.1737 15.5782 17.1555 15.07 18.6802C14.9736 18.9694 14.8687 19.2483 14.7548 19.5131C17.5154 18.5005 19.5628 16.0099 19.9381 13H15.9823ZM19.9381 11C19.5628 7.99009 17.5154 5.49946 14.7548 4.48694C14.9524 4.94639 15.1263 5.45584 15.2767 6.00094C15.6657 7.41167 15.916 9.13314 15.9823 11H19.9381Z"
                              fill="currentColor"
                            ></path>
                          </svg></button
                      ></span>
                    </div>
                  </div>
                </div>
                <div class="flex gap-x-1">
                  <div class="min-w-8">
                    <div class="relative h-8 w-8">
                      <span class="" data-state="closed"
                        ><div
                          class="flex h-full w-full items-center justify-center rounded-full"
                          style="
                            view-transition-name: var(--vt-composer-speech-button);
                            background: linear-gradient(
                              rgb(255, 255, 255) 0%,
                              rgb(255, 255, 255) 100%
                            );
                            will-change: auto;
                          "
                        >
                          <button
                            @click="sendMessage"
                            data-testid="composer-speech-button"
                            aria-label="Khởi động chế độ thoại"
                            class="relative flex h-8 w-8 items-center justify-center rounded-full text-white transition-colors hover:opacity-70 focus-visible:outline-none focus-visible:outline-black disabled:text-[#f4f4f4] disabled:opacity-30 dark:text-black"
                          >
                            <div class="relative h-full w-full">
                              <div
                                class="absolute inset-0 flex items-center justify-center"
                              >
                                <svg
                                  width="24"
                                  height="24"
                                  viewBox="0 0 24 24"
                                  fill="none"
                                  style="color: black"
                                  xmlns="http://www.w3.org/2000/svg"
                                >
                                  <path
                                    d="M9.5 4C8.67157 4 8 4.67157 8 5.5V18.5C8 19.3284 8.67157 20 9.5 20C10.3284 20 11 19.3284 11 18.5V5.5C11 4.67157 10.3284 4 9.5 4Z"
                                    fill="currentColor"
                                  ></path>
                                  <path
                                    d="M13 8.5C13 7.67157 13.6716 7 14.5 7C15.3284 7 16 7.67157 16 8.5V15.5C16 16.3284 15.3284 17 14.5 17C13.6716 17 13 16.3284 13 15.5V8.5Z"
                                    fill="currentColor"
                                  ></path>
                                  <path
                                    d="M4.5 9C3.67157 9 3 9.67157 3 10.5V13.5C3 14.3284 3.67157 15 4.5 15C5.32843 15 6 14.3284 6 13.5V10.5C6 9.67157 5.32843 9 4.5 9Z"
                                    fill="currentColor"
                                  ></path>
                                  <path
                                    d="M19.5 9C18.6716 9 18 9.67157 18 10.5V13.5C18 14.3284 18.6716 15 19.5 15C20.3284 15 21 14.3284 21 13.5V10.5C21 9.67157 20.3284 9 19.5 9Z"
                                    fill="currentColor"
                                  ></path>
                                </svg>
                              </div>
                            </div>
                          </button></div
                      ></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "MessageInput",
  data() {
    return {
      inputContent: "",
      isEmpty: true,
    };
  },
  methods: {
    sendMessage() {
      const cleanedContent = this.cleanContent(this.inputContent);
      if (cleanedContent.trim()) {
        this.$emit("send", cleanedContent);

        if (this.$refs.textarea) {
          this.$refs.textarea.innerHTML = "";
        }

        this.inputContent = "";
        this.isEmpty = true;
      }
    },

    handleInput(event) {
      const newContent = event.target.innerText.trim();
      this.inputContent = newContent;
      this.isEmpty = newContent === "";
    },

    cleanContent(content) {
      const tempDiv = document.createElement("div");
      tempDiv.innerHTML = content;

      const paragraphs = tempDiv.querySelectorAll("div, p");
      paragraphs.forEach((paragraph) => {
        paragraph.outerHTML = paragraph.innerHTML;
      });

      return tempDiv.innerHTML.replace(/<div>/g, "\n").replace(/<\/div>/g, "\n");
    },

    handleFocus() {
      if (this.isEmpty) {
        this.inputContent = "";
      }
    },

    handleBlur() {
      if (this.inputContent === "") {
        this.isEmpty = true;
      }
    },
  },
};
</script>

<style scoped>
.message-input {
  display: flex;
  gap: 10px;
  background: #212121;
}
.w-full {
  width: 100%;
}
.flex {
  display: flex;
}
.justify-center {
  justify-content: center;
}
.items-center {
  align-items: center;
}
.relative {
  position: relative;
}
.h-full {
  height: 100%;
}
.max-w-full {
  max-width: 100%;
}
.flex-1 {
  flex: 1 1 0%;
}
.flex-col {
  flex-direction: column;
}
.cursor-text {
  cursor: text;
}
.flex-col {
  flex-direction: column;
}
.rounded-3xl {
  border-radius: 1.5rem;
}
.bg-\[\#f4f4f4\] {
  --tw-bg-opacity: 1;
  background-color: rgb(244 244 244 / var(--tw-bg-opacity));
}
.px-2\.5 {
  padding-left: 0.625rem;
  padding-right: 0.625rem;
}
.py-1 {
  padding-bottom: 0.25rem;
  padding-top: 0.25rem;
}
.transition-colors {
  transition-duration: 0.15s;
  transition-property: color, background-color, border-color, text-decoration-color, fill,
    stroke;
  transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
}
.contain-inline-size {
  --tw-contain-size: inline-size;
  contain: var(--tw-contain-size) var(--tw-contain-layout) var(--tw-contain-paint)
    var(--tw-contain-style);
}
.dark\:bg-token-main-surface-secondary:is(.dark *) {
  background-color: #2f2f2f;
}
.min-h-\[44px\] {
  min-height: 44px;
}
.items-start {
  align-items: flex-start;
}
[dir="ltr"] .pl-2 {
  padding-left: 0.5rem;
}
.min-w-0 {
  min-width: 0;
}
.max-w-full {
  max-width: 100%;
}
.flex-1 {
  flex: 1 1 0%;
}
.max-h-\[25dvh\] {
  max-height: 25dvh;
}
.overflow-auto {
  overflow: auto;
}
.text-token-text-primary {
  color: #ececec;
}
.h-10 {
  height: 2.5rem;
}
.resize-none {
  resize: none;
}
.border-0 {
  border-width: 0;
}
.text-token-text-primary {
  color: #ececec;
}

.py-2 {
  padding-bottom: 0.5rem;
  padding-top: 0.5rem;
}
.px-0 {
  padding-left: 0;
  padding-right: 0;
}
.bg-transparent {
  background-color: transparent;
}
._prosemirror-parent_cy42l_1 .ProseMirror {
  word-wrap: break-word;
  font-feature-settings: "liga" 0, none;
  font-variant-ligatures: none;
  margin-bottom: 0.5rem;
  margin-top: 0.5rem;
  padding-left: 0;
  padding-right: 0;
  white-space: pre-wrap;
  white-space: break-spaces;
}
._prosemirror-parent_cy42l_1 .ProseMirror[contenteditable] {
  outline: 2px solid transparent;
  outline-offset: 2px;
  outline-width: 0;
}
._prosemirror-parent_cy42l_1 p {
  white-space: pre-wrap;
}

blockquote,
dd,
dl,
figure,
h1,
h2,
h3,
h4,
h5,
h6,
hr,
p,
pre {
  margin: 0;
}
._prosemirror-parent_cy42l_1.default-browser .placeholder .ProseMirror-trailingBreak {
  display: none !important;
}
._prosemirror-parent_cy42l_1.default-browser .placeholder:after {
  --tw-content: attr(data-placeholder);
  color: #b4b4b4;
  content: attr(data-placeholder);
  cursor: text;
  pointer-events: none;
  position: relative;
}
.pt-1 {
  padding-top: 0.25rem;
}

.w-\[32px\] {
  width: 32px;
}
[dir="ltr"] .left-0 {
  left: 0;
}

.block {
  display: block;
}
.top-0 {
  top: 0;
}
.fixed {
  position: fixed;
}
.invisible {
  visibility: hidden;
}
.pointer-events-none {
  pointer-events: none;
}
.justify-between {
  justify-content: space-between;
}

.items-center {
  align-items: center;
}
.h-\[44px\] {
  height: 44px;
}
.text-token-text-primary {
  color: #ececec;
}
.gap-x-1 {
  column-gap: 0.25rem;
}
.h-8 {
  height: 2rem;
}
.dark\:text-white:is(.dark *) {
  --tw-text-opacity: 1;
  color: rgb(255 255 255 / 1);
}

[dir="ltr"] .rounded-bl-xl {
  border-bottom-left-radius: 0.75rem;
}
.opacity-30 {
  opacity: 0.3;
}
.text-token-text-primary {
  color: #ececec;
}
.rounded-lg {
  border-radius: 0.5rem;
}
.justify-center {
  justify-content: center;
}
.items-center {
  align-items: center;
}
.w-8 {
  width: 2rem;
}
.h-8 {
  height: 2rem;
}
.flex {
  display: flex;
}
:disabled {
  cursor: default;
}
[role="button"],
button {
  cursor: pointer;
}
button,
input:where([type="button"]),
input:where([type="reset"]),
input:where([type="submit"]) {
  -webkit-appearance: button;
  background-color: transparent;
  background-image: none;
}
button,
select {
  text-transform: none;
}
button,
input,
optgroup,
select,
textarea {
  font-feature-settings: inherit;
  color: inherit;
  font-family: inherit;
  font-size: 100%;
  font-variation-settings: inherit;
  font-weight: inherit;
  letter-spacing: inherit;
  line-height: inherit;
  margin: 0;
  padding: 0;
}
.dark\:bg-token-main-surface-secondary:is(.dark *) {
  background-color: #2f2f2f;
}
#composer-background {
  background-color: #2f2f2f;
}
.p-1 {
  padding: 0.25rem;
}
.rounded-lg {
  border-radius: 0.5rem;
}
.font-semibold {
  font-weight: 600;
}
audio,
canvas,
embed,
iframe,
img,
object,
svg,
video {
  display: block;
  vertical-align: middle;
}

button {
  border: none;
}
.min-w-8 {
  min-width: 2rem;
}
.gap-x-1 {
  column-gap: 0.25rem;
}
.w-8 {
  width: 2rem;
}

.h-8 {
  height: 2rem;
}
.rounded-full {
  border-radius: 9999px;
}
.dark\:text-black:is(.dark *) {
  --tw-text-opacity: 1;
  color: rgb(0 0 0 / 1);
}

.transition-colors {
  transition-duration: 0.15s;
  transition-property: color, background-color, border-color, text-decoration-color, fill,
    stroke;
  transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
}
.inset-0 {
  inset: 0;
}

.absolute {
  position: absolute;
}

._prosemirror-parent_cy42l_1 p {
  white-space: pre-wrap;
}
._prosemirror-parent_cy42l_1.default-browser .placeholder:after {
  --tw-content: attr(data-placeholder);
  color: var(--text-secondary);
  content: var(--tw-content);
  cursor: text;
  pointer-events: none;
  position: relative;
}

#prompt-textarea {
  color: #fff;
  text-align: left;
  padding-left: 10px;
}

.placeholder {
  color: #a9a9a9;
  pointer-events: none;
  position: absolute;
  top: 0;
  left: 0;
  margin: 0;
  font-style: italic;
}

.ProseMirror {
  position: relative;
  min-height: 40px;
  padding: 5px 0 5px 0;
  color: #333;
  font-size: 16px;
  line-height: 1.5;
  outline: none;
  cursor: text;
}

.ProseMirror:empty::before {
  content: attr(data-placeholder);
  color: #a9a9a9;
  pointer-events: none;
}

.ProseMirror[contenteditable="true"] {
  min-height: 40px;
  outline: none;
}

.dark :hover {
  scrollbar-color: #676767 transparent;
}

@media (hover: hover) and (pointer: fine) {
  .hover\:bg-black\/10:hover {
    background-color: #0000001a;
  }
}
</style>
