<!DOCTYPE html>
<html>
<head>
	<title>Agreement Bond</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<!-- Custom CSS -->
	<style>
		body {
			font-family: Arial, sans-serif;
			padding: 20px;
		}
		h1 {
			margin-bottom: 30px;
			text-align: center;
			font-size: 36px;
			font-weight: bold;
			color: #007bff;
		}
		p {
			font-size: 18px;
			line-height: 1.5;
			margin-bottom: 20px;
		}
		.signature-box {
			margin-top: 50px;
			border: 1px solid #ccc;
			padding: 20px;
			text-align: center;
			position: relative;
		}
		.signature-box::before {
			content: "Signature";
			font-size: 16px;
			font-weight: bold;
			position: absolute;
			top: -15px;
			left: 50%;
			transform: translateX(-50%);
			background-color: #fff;
			padding: 0 10px;
		}
		.signature-box input[type="text"] {
			border: none;
			border-bottom: 1px solid #ccc;
			width: 80%;
			padding: 5px 10px;
			margin-bottom: 20px;
		}
		.signature-box .btn {
			background-color: #007bff;
			color: #fff;
			font-size: 18px;
			padding: 10px 20px;
			border-radius: 5px;
			border: none;
		}
		.signature-box .btn:hover {
			background-color: #0062cc;
			cursor: pointer;
		}
	</style>
</head>
<body>
	<div class="container">
		<h1>Agreement Bond</h1>
		<p>This agreement bond ("Agreement") is made and entered into on the date of <strong>[insert date]</strong> by and between <strong>[insert party 1 name]</strong> and <strong>[insert party 2 name]</strong>.</p>
		<p>Whereas, the parties wish to enter into an agreement for <strong>[insert purpose of agreement]</strong> on the terms and conditions set forth herein, the parties agree as follows:</p>
		<ol>
			<li><strong>[insert first term of agreement]</strong></li>
			<li><strong>[insert second term of agreement]</strong></li>
			<li><strong>[insert third term of agreement]</strong></li>
		</ol>
		<div class="signature-box">
			<label for="party1-name">Party 1 Name:</label>
			<input type="text" id="party1-name" name="party1-name" required>
			<label for="party1-signature">Party 1 Signature:</label>
			<input type="text" id="party1-signature" name="party1-signature" required>
			<label for="party2-name">Party 2 Name:</label>
			<input type="text" id="party2-name" name="party2-name" required>
			<label for="party2-signature">Party 2 Signature:</label>
			<input type="text" id="party2-signature" name="party2-signature" required>
        </div>
    </div>
</body>
</html>