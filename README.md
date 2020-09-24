Bài tập thực hành về CakePHP - Quản lý shop mỹ phẩm - ThuanNHT - 202010

## Môi trường phát triển
- PHP 7.4.x
- CakePHP 4.x
- MariaDB 10.4.14

## Nội dung

### Trang chủ
	Hiển thi thông tin sản phẩm, danh mục sản phẩm và các thông tin cần thiết cho một shop bán mỹ phẩm
### Login
	Nhập thông tin user/password để thực hiện đăng nhập
	Password mã hóa theo framework
### Đăng ký user
	Cần validate các trường user là duy nhất, địa chỉ email phải hợp lệ, số điện thoại chỉ được nhập số
### Lấy lại mật khẩu
	Tự động tạo mật khẩu mới rồi gửi mail thông tin mật khẩu
### Thay đổi thông tin cá nhân
	Chỉ được thay đổi thông tin của cá nhân
### Danh sách user
	Chỉ có admin có chức năng này
### Sửa thông tin cá nhân
	Admin có thể thay đổi thông tin số điện thoại, mật khẩu, địa chỉ, role của tất cả các user, có quyền đóng user
### Danh mục sản phẩm
	Admin có quyền thực hiện
### Thêm danh mục sản phẩm
	Admin có quyền thực hiện
### Sửa danh mục sản phẩm
	Admin có quyền thực hiện
### Xóa danh mục sản phẩm
	Admin có quyền thực hiện
	Trường hợp danh mục đang có sản phẩm thì không được xóa

### Danh sách sản phẩm
	Chỉ Admin và nhân viên báng hàng mới có quyền
### Thêm sản phẩm, sửa sản phẩm, xóa sản phẩm
	Admin có quyền thực hiện, sản phẩm có 2 loại là hàng mỹ phẩm và hàng quà tặng, mỗi 1 sản phẩm mỹ phẩm khi mua sẽ được tặng 1 số point, dùng point để mua hàng quà tặng
### Xem nội dung sản phẩm
	Chỉ Admin và nhân viên báng hàng mới có quyền


### Danh sách order
	Chỉ Admin và nhân viên báng hàng mới có quyền
### Xem nội dung order
	Chỉ Admin và nhân viên báng hàng mới có quyền

### Order sản phẩm
	Tất cả mọi người dùng đều có quyền mua sản phẩm (không cần login vào hệ thống cũng có thể mua hàng, sau khi hoàn thành đơn hàng thì lấy thông tin của khách hàng để tạo user mới), tuy nhiên cần kiểm tra sản phẩm có còn hay không?
	Sản phẩm được chọn mua sẽ nằm trong giỏ hàng để người dùng có thể xác nhận lại thông tin sản phẩm muốn mua.
	Người dùng cần nhập thông tin cá nhân như: Họ, tên, sđt, địa chỉ giao hàng, email... trước khi hoàn thành đơn hàng
	Khi đơn hàng được đặt hàng thành công thì hệ thống gửi mail tới địa chỉ email của người dùng và email của admin
### Order sản phẩm dùng thử
	Tạo một trang đăng ký mua bộ mỹ phẩm dùng thử
### Duyệt đơn hàng
	Khi có đơn hàng (bao gồm cả đơn hàng dùng thử) mới thì cần được nhân viên bán hàng xác nhận trước khi hàng được giao
	Chỉ nhân viên bán hàng có quyền duyệt đơn hàng, có thể thực hiện duyệt hoặc từ chối đơn hàng, trường hợp duyệt, thì số lượng của sản phẩm phải trừ đi bằng số lượng được mua trong order.

## Tham khảo
	Book: https://book.cakephp.org/
	Coding convention: https://www.php-fig.org/psr/
