document.addEventListener('DOMContentLoaded', function () {
    const select = document.getElementById('bank-name');
    const wrapper = select.closest('.custom-select-wrapper'); // Đảm bảo select nằm trong wrapper
    let dropdown;

    // Tạo wrapper nếu chưa có
    if (!wrapper) {
        const newWrapper = document.createElement('div');
        newWrapper.className = 'custom-select-wrapper';
        select.parentNode.insertBefore(newWrapper, select);
        newWrapper.appendChild(select);
    }

    // Create custom dropdown
    createCustomDropdown();

    select.addEventListener('mousedown', function (e) {
        e.preventDefault();
        toggleDropdown();
    });

    document.addEventListener('click', function (e) {
        if (!wrapper.contains(e.target)) {
            closeDropdown();
        }
    });

    function createCustomDropdown() {
        dropdown = document.createElement('div');
        dropdown.className = 'select-dropdown';

        Array.from(select.options).forEach((option, index) => {
            if (index === 0) return; // Skip the placeholder option
            const optionElement = document.createElement('div');
            optionElement.className = 'select-option';
            optionElement.textContent = option.textContent;
            optionElement.addEventListener('click', () => selectOption(index));
            dropdown.appendChild(optionElement);
        });

        wrapper.appendChild(dropdown);
    }

    function toggleDropdown() {
        dropdown.classList.toggle('show');
    }

    function closeDropdown() {
        dropdown.classList.remove('show');
    }

    function selectOption(index) {
        select.selectedIndex = index;
        select.dispatchEvent(new Event('change'));
        closeDropdown();
    }

    // Update dropdown when select options change (e.g., from API)
    const observer = new MutationObserver(() => {
        dropdown.innerHTML = '';
        createCustomDropdown();
    });
    observer.observe(select, { childList: true });

    function toggleDropdown() {
        const isOpen = dropdown.classList.toggle('show');
        select.classList.toggle('active', isOpen);
    }

    function closeDropdown() {
        dropdown.classList.remove('show');
        select.classList.remove('active');
    }
});