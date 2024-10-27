    document.getElementById('addCustomerForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Ngăn chặn form submit mặc định

        let ten = document.getElementById('ten').value;
        let sdt = document.getElementById('sdt').value;
        let email = document.getElementById('email').value;
        let matkhau = document.getElementById('matkhau').value;

        // Clear previous errors
        document.getElementById('addCustomerError').classList.add('d-none');
        document.getElementById('addCustomerError').textContent = '';

        // Validate email and phone number
        if (!/^[a-zA-Z0-9._%+-]+@gmail\.com$/.test(email)) {
            document.getElementById('email').value = '';
            document.getElementById('addCustomerError').textContent = 'Email không đúng định dạng';
            document.getElementById('addCustomerError').classList.remove('d-none');
            return;
        }

        if (!/^(0|\+84)[3|5|7|8|9][0-9]{8}$/.test(sdt)) {
            document.getElementById('sdt').value = '';
            document.getElementById('addCustomerError').textContent = 'Số điện thoại không đúng định dạng';
            document.getElementById('addCustomerError').classList.remove('d-none');
            return;
        }

        // AJAX request to check for duplicate email or phone number
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "controller/controller.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.status === "error") {
                    document.getElementById('addCustomerError').textContent = response.message;
                    document.getElementById('addCustomerError').classList.remove('d-none');
                    if (response.message.includes("Email")) {
                        document.getElementById('email').value = '';
                    }
                    if (response.message.includes("Số điện thoại")) {
                        document.getElementById('sdt').value = '';
                    }
                } else {
                    // Submit the form if no errors
                    document.getElementById('addCustomerForm').submit();
                }
            }
        };
        xhr.send("action=checkDuplicate&email=" + email + "&sdt=" + sdt);
    });

    function openAddEmailModal(makhachhang) {
        document.getElementById('makhachhang').value = makhachhang;
        var addEmailModal = new bootstrap.Modal(document.getElementById('addEmailModal'));
        addEmailModal.show();
    }

    function confirmVerify(makhachhang) {
        if (confirm('Bạn có chắc chắn muốn xác thực khách hàng này không?')) {
            window.location.href = '?page=verifykhachhang&makhachhang=' + makhachhang;
        }
    }

    function confirmDeleteCustomer() {
        return confirm('Bạn có chắc chắn muốn xóa khách hàng này không?');
    }
