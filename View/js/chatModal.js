const chatModal = document.querySelector(".chat-modal");
const supportChatBtn = document.querySelector(".modal-btn-container button");
// const minusBtn = document.querySelector(".modal-minus-btn")
const closeBtn = document.querySelector(".modal-close-btn");

supportChatBtn.onclick = () => {
  if (chatModal.classList.contains("active")) {
    chatModal.classList.add("inActive");
    chatModal.classList.remove("active");
  } else {
    chatModal.classList.add("active");
    chatModal.classList.remove("inActive");
  }
};

closeBtn.onclick = () => {
  chatModal.classList.add("inActive");
  chatModal.classList.remove("active");
};

// console.log(chatModal.style.display);
