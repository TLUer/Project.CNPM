<?php
require("../../connect.php");
if (isset($_GET['ten_dang_nhap'])) {
	$tdn = $_GET['ten_dang_nhap'];

	// Kiểm tra và xóa các hóa đơn liên quan trước khi xóa khách hàng
	$deleteHoadonQuery = mysqli_query($conn, "DELETE FROM hoadon WHERE idKH IN (SELECT id FROM khachhang WHERE ten_dang_nhap = '$tdn')");

	// Xóa khách hàng
	$deleteKhachhangQuery = mysqli_query($conn, "DELETE FROM khachhang WHERE ten_dang_nhap = '$tdn'");
	$deleteTaikhoanQuery = mysqli_query($conn, "DELETE FROM taikhoan WHERE ten_dang_nhap = '$tdn'");

	// Kiểm tra xem việc xóa thành công hay không
	if ($deleteKhachhangQuery && $deleteTaikhoanQuery && $deleteHoadonQuery) {
		header("location: ../trangchuad.php?cn=qltk");
	} else {
		// Xử lý thông báo lỗi khi không thể xóa khách hàng
		echo "Không thể xóa khách hàng.";
	}
}
?>