<?php
include_once(__DIR__ . "/app.php");

if ($_SESSION['authenticated'] ?? false) {
    header("Location: admin_page.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        section {
            width: 100vw;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        form {
            width: 250px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        input {
            margin-bottom: 1rem;
        }
        
        .message {
            width: 300px;
            min-height: 50px;
            /* display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center; */
            padding: 0.5rem;
            border: 1px solid rgba(0, 0, 0, 0.2);
            border-radius: 3px;
            box-shadow: 5px 5px 2px rgba(0, 0, 0, 0.2);
            transition: all 250ms ease-in-out;
        }

        .message + .message {
            margin-top: 1rem;
        }

        .green {
            background-color: rgba(0, 255, 0, 0.5);
        }

        .red {
            background-color: rgba(255, 0, 0, 0.5);
        }

        .blue {
            background-color: rgba(0, 0, 255, 0.5);
        }

    </style>
</head>
<body>
    <main>
        <section>
            <form action="login.php" method="post">
                <label for="email">E-paštas</label>
                <input type="email" name="email" id="email">
                <label for="password">Slaptažodis</label>
                <input type="password" name="password" id="password">
                <input type="submit" value="Submit">
            </form>
            <div class="messages">
                <?php
                Messages::get();
                // new Messages();
                ?>
            </div>
        </section>
    </main>
    <script>
        const interval = 3000;
        let timeout = 3000;
        const myInterval = setInterval(deteleElement, interval);

        function deteleElement() {
            const message = document.querySelector(".message");
            if (message === null) {
                clearInterval(myInterval);
                return;
            }
            message.style.opacity = "0";
            setTimeout(() => {
                message.style.display = "none";
            }, 300);
            setTimeout(() => {
                message.remove();
            }, timeout - 100);
            timeout = timeout + interval;
        }
    </script>
</body>
</html>