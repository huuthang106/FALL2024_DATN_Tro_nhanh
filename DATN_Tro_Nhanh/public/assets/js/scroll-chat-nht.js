
function scrollToBottom() {
	var chatBox = document.getElementById('chatBox');
	if (chatBox) {
		chatBox.scrollTop = chatBox.scrollHeight;
	}
}

document.addEventListener('livewire:initialized', () => {
	scrollToBottom();

	Livewire.hook('message.processed', (message, component) => {
		setTimeout(scrollToBottom, 100);
	});
});

// Thêm listener cho sự kiện DOMContentLoaded
document.addEventListener('DOMContentLoaded', () => {
	setTimeout(scrollToBottom, 100);
});

// Thêm MutationObserver để theo dõi thay đổi trong chatBox
const observer = new MutationObserver(scrollToBottom);
const chatBox = document.getElementById('chatBox');
if (chatBox) {
	observer.observe(chatBox, {
		childList: true,
		subtree: true
	});
}