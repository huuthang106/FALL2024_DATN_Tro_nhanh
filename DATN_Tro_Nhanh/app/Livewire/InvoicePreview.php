<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Bill;
use App\Models\User;
class InvoicePreview extends Component
{
    public $billId;
    public $bill;
    public $recipient_name;
    public $room_number;
    public $amount;
    public $description;
    public $title;
    public $payment_due_date;
    public $user; // Thêm thuộc tính để lưu thông tin người dùng
    public $name;
    public $address;
    public $email;
    public $phone;
    public $status;
    public $showModal;
    public function mount($billId)
{
    $this->billId = $billId;
    $this->bill = Bill::with('payer')->find($this->billId); // Lấy hóa đơn cùng với thông tin người dùng

    // Kiểm tra xem hóa đơn có tồn tại không
    if ($this->bill) {
        // Khởi tạo các thuộc tính khác nếu cần
        $this->recipient_name = $this->bill->recipient_name;
        $this->room_number = $this->bill->room_number;
        $this->amount = $this->bill->amount;
        $this->description = $this->bill->description;
        $this->title = $this->bill->title;
        $this->status = $this->bill->status;
        $this->payment_due_date = $this->bill->payment_due_date;

        // Lưu thông tin địa chỉ của người dùng
        if ($this->bill->payer) {
            $this->address = $this->bill->payer->address; // Giả sử có thuộc tính address trong model User
        } else {
            $this->address = ''; // Nếu không có thông tin người dùng
        }
    } else {
        // Nếu hóa đơn không tồn tại
        $this->recipient_name = '';
        $this->room_number = '';
        $this->amount = '';
        $this->description = '';
        $this->title = '';
        $this->status = '';
        $this->payment_due_date = '';
        $this->address = ''; // Đặt địa chỉ thành rỗng
    }
}
    public function editBill($billId)
    {
        $this->billId = $billId;
        $this->bill = Bill::with('user')->find($this->billId); // Lấy hóa đơn cùng với thông tin người dùng
    
        if ($this->bill) {
            $this->recipient_name = $this->bill->recipient_name;
            $this->room_number = $this->bill->room_number;
            $this->amount = $this->bill->amount;
            $this->description = $this->bill->description;
            $this->title = $this->bill->title;
            $this->payment_due_date = $this->bill->payment_due_date;
            $this->status = $this->bill->status;
    
            // Nếu cần, bạn có thể lấy thêm thông tin người dùng
            if ($this->bill->user) {
                $this->name = $this->bill->user->name; // Giả sử có thuộc tính name trong model User
                $this->address = $this->bill->user->address; // Giả sử có thuộc tính address trong model User
                $this->email = $this->bill->user->email; // Lấy email từ model User
                $this->phone = $this->bill->user->phone; // Lấy số điện thoại từ model User
            }
        }
    
        // Đặt trạng thái modal thành true để hiển thị
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false; // Đặt trạng thái modal thành false để ẩn
    }

    public function updateBill()
    {
        // Logic để cập nhật hóa đơn
        $this->bill->update([
            'recipient_name' => $this->recipient_name,
            'room_number' => $this->room_number,
            'amount' => $this->amount,
            'description' => $this->description,
            'title' => $this->title,
            'payment_due_date' => $this->payment_due_date,
        ]);

        // Đóng modal sau khi cập nhật thành công
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.invoice-preview');
    }
}