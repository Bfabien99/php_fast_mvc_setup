<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>500</title>

  <style>
    * {
      box-sizing: border-box;
    }
    body {
      font: 110%/1.5 system-ui, sans-serif;
      background: #131417;
      color: white;
      height: 100vh;
      margin: 0;
      display: grid;
      place-items: center;
      padding: 2rem;
    }
    main {
      max-width: 350px;
      text-align: center;
    }
    a {
      color: #56BBF9;
    }
  </style>

</head>

<body>
  
  <main>

    <h1 data-test-id="text-500">500</h1>

    <p>Oops! Something went wrong on our server.</p>
    <p>We're working to fix the issue. Please try again later, or contact support if the problem persists.</p>
    <hr>
    <p style="color:red"><?= $message; ?></p>
  </main>

</body>

</html>
