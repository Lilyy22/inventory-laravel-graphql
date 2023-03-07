<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">   <title>Document</title>
    <link rel="stylesheet" href="https://kit.fontawesome.com/f0bb670981.css" crossorigin="anonymous">
    
    <style>
        body{
            font-family: 'Poppins', sans-serif;
        }
        p{
            padding: 0;
            margin: 0;
        }
        .id{
            display: inline-block;
            font-weight: 600;
            color:#b2b3b6; 
            font-size: 10px;
            margin: 0;
        }
        .back{
            background-color: #3170b5; 
            color: white;
            list-style: none;
            display: flex;
            justify-content: space-between;
            padding: 0 38px 0 38px;
            font-size: 12px;
            font-weight: lighter;
        }
        .blue{
            color: #3170b5;
        }
        .thumbnail{
            border-radius: 7px;
            border: 3.5px #3170b5 solid;
            /* z-index: 1; */
            width: 110px;
            height: 110px;
            margin-top: -26%;
            margin-bottom: 10%;
            box-shadow: 0px -2px 9px  rgba(50, 50, 50, 0.5);
        }
        .head{
            background-color: #3170b5;
            border-top-left-radius: 19px;
            border-top-right-radius: 19px;
            height: 33%;
            padding: 5px 0 5px 0;
        }
        .head img{
            float: right;
            width: 49%;
            height: 70%;
            margin-right: 25px;
            margin-top: 8px;
            margin-bottom: 8px;
        }
        .card{
            border-radius: 19px;
            margin: 30px 20px 40px 20px;
            height: 310px;
            width: 490px;
            box-shadow: 3px 2px 7px 5px rgba(70, 70, 70, 0.1);
            border: none;

        }
        .side-ban{
            background-color: #6bc7e0;
            border-top-left-radius: 6px;
            border-bottom-left-radius: 6px;
            display: flex;
            justify-content: flex-start;
            padding: 5px 0px 5px 18px;
            margin: 0 0 9px 10px;
            position: relative;
            left: 0;
            font-size: 10px;
            letter-spacing: 0.5px;
            font-weight: 600;
            box-shadow: 0px 5px 4px rgba(50, 50, 50, 0.2);
        }
        .main-container{
            display: flex;
            justify-content: space-between;
            background-image: url('mask-front.png');
            background-size: cover;
            background-position: bottom;
            height: 320px;
        }
        .profile-picture{
            margin: 0 13px 0 13px;
        }

        .back-head{
            background-image: url('mask back.png');
            background-size: cover;
            background-position: top;
            padding-left: 28px;
            padding-top: 21px;
            padding-bottom: 21px;
        }
    </style>
</head>
<body>

<div class="d-flex">
    <div class="card">
        <div class="head">
            <img src="{{asset('mols white.png')}}" alt="MOls-Logo" class="my-3">
        </div>
        <div class="main-container">
            <div class="profile-picture text-center">
                <img 
                    class="thumbnail"
                    src="https://corporate.ethiopianairlines.com/images/default-source/corporate-image/ato-mesfin6707d3b5ea3149a689cf12f84b62a0e7.jpg?sfvrsn=2a0d488b_2"
                    alt="Employee">
                <p class="mx-auto font-weight-bold">
                    አለማየሁ አሽቴ አዳነ <br />
                    ALEMAYEHU ESHETE ADANE
                </p>
            </div>
            <!-- side to side blue badges -->
            <div style="flex-grow:1; width: 60%;">

                <div class="my-3" style="padding-left: 28px; display: flex;">
                    <span 
                        class="pr-3 font-weight-bold id">
                            ID NO<br> የመ.ቁ 
                    </span>
                    <span
                        class="blue font-weight-bold my-auto id" 
                        style="letter-spacing: 0.7px; font-size: 14px; margin-bottom: -41px;">
                        MOLS-3449E3
                    </span>
                </div>
                
                <div class="shadow side-ban">
                    <div>
                        <p class="pb-1">Issued Date</p>
                        <p>የተሰጠበት ቀን</p>
                    </div>
                    <div class="ml-5">
                        <p class="pb-1">April / &nbsp2022</p>
                        <p>ሚያዝያ / 2014</p>
                    </div>
                </div>
                <div class="side-ban">
                    <div>
                        <p class="pb-1">Expiry Date</p>
                        <p>የሚያበቃበት ቀን</p>
                    </div>
                    <div class="ml-5">
                        <p class="pb-1">June / 2023</p>
                        <p>ሚያዝያ / 2015</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <!-- back face -->
    <div class="card">
        <div class="back-head">
            <img 
                style="width: 105px; height: 100px;"
                src="mols logo only.png"
                alt="">
        </div>
        <div class="back">
            <div class="py-3">
                <li class="py-1">
                    <i class="fa fa-phone fa-fw" aria-hidden="true"></i>
                    (011) 555-4561
                </li>
                <li class="py-1">
                    <i class="fa fa-envelope-o fa-fw" aria-hidden="true"></i>
                    PoBox: 124498
                </li>

            </div>
            <div class="py-3">
                <li class="py-1">
                    <i class="fa fa-mobile fa-fw" aria-hidden="true"></i>
                    +2519997----
                </li>
                <li class="py-1">
                    <i></i>
                    info@example.com
                </li>

            </div>
            <div class="py-3">
                <li class="py-1">
                    <i></i>
                    www.mols.com
                </li>
                <li class="py-1">
                    <i class="fa fa-facebook-official fa-fw" aria-hidden="true"></i>
                    fb.com/mols
                </li>

            </div>
        </div>
        <div class="my-2"
            style="padding-left: 38px; display: flex; justify-content: space-between;">
            <div style="display: flex;">
                <img 
                    src="https://t3.ftcdn.net/jpg/02/55/97/94/360_F_255979498_vewTRAL5en9T0VBNQlaDBoXHlCvJzpDl.jpg"
                    alt=""
                    style="width: 100px;">

                <p class="my-3 pl-1" style="font-size: 12px; font-weight: 500;">
                   <span class="pb-2">Authorized Signature</span>  <br>
                    የባለስልጣኑ ፊርማ
                </p>

            </div>

             <img 
             src="https://t3.ftcdn.net/jpg/02/55/97/94/360_F_255979498_vewTRAL5en9T0VBNQlaDBoXHlCvJzpDl.jpg"
             alt=""
             style="width: 100px; padding-right: 40px;">
        </div>
    </div>
</div>
<div class="m-4">
    <a href="#" id="DownloadLink" download="Mols ID.png"></a>
    <button class="btn btn-primary download-btn">
        Download
    </button>
</div>




    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js"></script>
    <script src="https://kit.fontawesome.com/f0bb670981.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        let downloadBtn = document.querySelector('.download-btn');
        let card = document.querySelector('.card');
    
        let exportCard = () => {
            html2canvas(card, {
                backgroundColor: null,
                dpi: 144,
                scale: 2
            })
            .then(canvas => {
                let link = document.getElementById('DownloadLink');
                link.href = canvas.toDataURL();
                link.click(); // click on the link
            })
        }
    
        downloadBtn.addEventListener('click', () => {
            exportCard();
        })
    
    </script>
</body>
</html>