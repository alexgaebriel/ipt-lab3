<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>File Upload</title>
    <link rel="icon" href="https://phpsandbox.io/assets/img/brand/phpsandbox.png">
    <link rel="stylesheet" href="https://assets.ubuntu.com/v1/vanilla-framework-version-4.15.0.min.css">
</head>
<body style="background-color: red;">
    <div class="u-fixed-width">
        <div class="p-logo-section">
            <div class="p-logo-section__items">
                <div class="p-logo-section__item">
                    <img class="p-logo-section__logo" src="https://www.auf.edu.ph/home/images/logo2.png" alt="Angeles University Foundation">
                </div>
            </div>
        </div>
    </div>

    <div class="row--50-50 grid-demo">
        <div class="col">
            <h4>File Upload</h4>

            <form action="uploaded.php" method="post" enctype="multipart/form-data">
                <div class="p-card">
                    <h3>Text File</h3>
                    <p class="p-card__content">
                        <input type="file" name="text_file" accept=".txt">
                    </p>
                </div>

                <div class="p-card">
                    <h3>PDF File</h3>
                    <p class="p-card__content">
                        <input type="file" name="pdf_file" accept=".pdf">
                    </p>
                </div>

                <div class="p-card">
                    <h3>Audio File</h3>
                    <p class="p-card__content">
                        <input type="file" name="audio_file" accept=".mp3">
                    </p>
                </div>

                <div class="p-card">
                    <h3>Video File</h3>
                    <p class="p-card__content">
                        <input type="file" name="video_file" accept=".mp4">
                    </p>
                </div>

                <div>
                    <button type="submit">Upload</button>
                </div>
            </form>
        </div>
        <div class="col">
            <img class="p-logo-section__logo" src="https://scontent.fbag4-1.fna.fbcdn.net/v/t39.30808-6/439873919_829413312538968_6525585059575596872_n.jpg?_nc_cat=103&ccb=1-7&_nc_sid=127cfc&_nc_ohc=7NCW0AstLaEQ7kNvgHWATfd&_nc_ht=scontent.fbag4-1.fna&oh=00_AYDyRTgBOOm87_TqXca525RhRzxx_0PSA9CblMWyNXpVzg&oe=66D266C7" alt="College of Computing Studies">
        </div>
    </div>
</body>
</html>
