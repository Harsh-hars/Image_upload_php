<?php
include './config.php';
if (isset($_POST['submit'])) {
    $filename = $_FILES['file']['name'];
    $temp_name = $_FILES['file']['tmp_name'];
    $folder = 'uploads/' . $filename;
    mysqli_query($conn, "INSERT INTO `imageupload`(`image`) VALUES ('$filename')");
    if (move_uploaded_file($temp_name, $folder)) {
        echo "uploaded successfully";
    } else {
        echo "failed brother";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">

    <div class="container mx-auto p-4">
        <h2 class="text-2xl font-bold mb-4 text-center">Upload Your File</h2>
        <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
            <form action="./upload.php" method="post" enctype="multipart/form-data">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="file">
                        Select file to upload:
                    </label>
                    <input type="file" name="file" id="file" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div class="flex items-center justify-between">
                    <button name="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        Upload
                    </button>
                </div>
            </form>

            <?php
            $res = mysqli_query($conn, "SELECT * FROM `imageupload`");
            while ($row = mysqli_fetch_assoc($res)) {
            ?>
                <img src="uploads/<?php echo $row['image'] ?>" />
            <?php  } ?>

        </div>
    </div>

</body>

</html>