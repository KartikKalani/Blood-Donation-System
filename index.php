<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        li {
            font-size: 28px;
        }

        details {
            font-size: 21px;
        }



        .indexdiv {


            padding: 2%;
            margin-top: 4%;
            margin-left: 10%;
            width: 80%;
            font-size: xx-large;
            background-color: lightcoral;

        }

        p {
            font-size: 28px;
        }

        summary {
            font-size: 28px;
        }
    </style>
</head>

<body bgcolor="#FFCEC4">

    <?php include 'header.php' ?>

    <div class="indexdiv">
        <h2 align="center"> &#34; &nbsp;Be the reason for someone&apos;s heartbeat&nbsp;&#34;</h2>

        <h3>Here are some of the Benefits : </h3>
        <ul style="list-style-type:square;">
            <li><b>Saving Lives : </b>Blood donation directly helps save lives of patients in need of blood transfusions, especially those suffering from accidents, blood disorders, or undergoing surgeries.</li>
            <li><b>Improved Health : </b>Donating blood can have positive effects on the donor's health, such as reducing the risk of heart attacks and improving overall well-being.</li>
            <li><b>Ensuring Blood Supply : </b>Regular blood donations help maintain an adequate blood supply for hospitals and medical facilities, ensuring that patients receive the blood they need when required.</li>
            <li><b>Rare Blood Type Matches : </b>Individuals with rare blood types are crucial for helping patients with similar blood types who may struggle to find compatible donors.</li>
            <li><b>Blood Typing and Screening : </b>Donating blood helps in identifying one's blood type and screening for various diseases, which can be beneficial for the donor's future health.</li>
            <li><b>Blood Component Utilization : </b>When a blood donation is made, it can be separated into different components (red cells, platelets, and plasma) to help multiple patients in need.</li>
            <li><b>Reducing the Spread of Diseases : </b>Regular blood donations help in early detection of diseases like HIV, hepatitis, and syphilis in the donor, reducing their spread in the community.</li>
        </ul>

        <h3>Common FAQs</h3>
        <details>
            <summary>How often can I donate blood ?</summary>
            <p>You must wait at least eight weeks (56 days) between donations of whole blood and 16 weeks (112 days) between Power Red donations. Whole blood donors can donate up to 6 times a year. Platelet apheresis donors may give every 7 days up to 24 times per year. Regulations are different for those giving blood for themselves (autologous donors).</p>
        </details>

        <details>
            <summary>Who can donate blood ?</summary>
            <p>In most states, donors must be age 17 or older. Some states allow donation by 16-year-olds with a signed parental consent form. Donors must weigh at least 110 pounds and be in good health. Additional eligibility criteria apply.</p>
        </details>

        <details>
            <summary>What should I do after donating blood ?</summary>
            <p>After successfully donating blood, it is vital to follow a set of guidelines to ensure your well-being and promote a swift recovery. Firstly, stay at the donation center for the recommended time, usually around 10-15 minutes, as this allows the staff to monitor you for any potential side effects or reactions. Secondly, replenish your fluids and energy levels by consuming a nutritious snack or meal, preferably one rich in carbohydrates, to help your body recover from the donation process.</p>
        </details>
    </div>

</body>

</html>