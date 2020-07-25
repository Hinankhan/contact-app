<html>
    <Head>
        <title> forms </title>
        <style>
        body {
            background-image: linear-gradient(to right, red , indigo);
            font-family:sans-serif;
        }
        button{
            background-color: white;
    /* color: black; */
            padding: 10px 25px;
            cursor: pointer;
            border-radius: 18px;
            border-color: darkviolet;
        }
        button:hover {
           width:80%;
        }
        .row {
            text-indent: 5px;
            border-color: aqua;
            border-radius: 23px;
            padding: 8px;
            outline: none;
            padding-right: 33px;
        }
        
        .forms {
            
            display:flex;
            margin:auto;
            align-items:center;
            padding:15px;
            flex-direction: column;
            border-radius: 7px;
            background-color: white;
            width: 19%;
            margin-top: 200px;
            padding-bottom: 49px;
            box-shadow: 0 19px 19px 0 rgba(0,0,0,0.7), 0 6px 20px 0 rgba(0,0,0,0.19)
        }
        </style>
    </Head>
    <body>
        <form action="insert.php" method="GET">
            <div class="forms">
                <h1> Create Account</h1>
                <input type="text" class="row" name="Name" placeholder="Name"> <br>
                <input type="text" class="row" name="email" placeholder="Email"><br>
                <button type="submit"> login </button>
            </div>    
        </form>
    </body>
</html>