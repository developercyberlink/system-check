<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tundi Group Pvt. Ltd.</title>
<style>
table {
    border-collapse: collapse;
	width:100%;
}
table, th, td {
    border: 1px solid #ddd;
	padding:8px;
}
</style>
</head>
<body style="font-family: sans-serif">
<div style="margin:0 auto; max-width:700px; width:100%;">
<center>
<div style="background:#FFF; padding:8px 0px; margin-bottom:5px;">
<img src="{{ asset('public/themes-assets/img/logo.png') }}" />
</div>
</center>
<table>
  <tr>
    <td bgcolor="#ddd"  ><strong>Name</strong></td>
    <td bgcolor="#ddd" >{{ $name }}</td>
  </tr>
  <tr>
    <td><strong>Subject</strong></td>
    <td>{{ $subject }}</td>
  </tr>
  <tr>
    <td><strong>Phone </strong></td>
    <td>{{ $phone }}</td> 
  </tr>
  <tr>
    <td><strong>Email</strong></td>
    <td>{{ $email }}</td>
  </tr>
  <tr>
    <td><strong>Comment</strong></td>
    <td>{{ $comment }}</td>
  </tr>
</table>
<p>Thank You</p>
</div>
</body>
</html>
