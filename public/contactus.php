<?php
include 'includes/header.php';
include 'includes/sidenav.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Contact Us</title>
    <style>
        .contactus h3 {
            font-weight: bold;
            text-align: center;
            font-size: 24px;
        }

        .intro {
            padding: 50px 0px 50px 0px;
        }

        .FAQbox {
            padding: 25px 50px 50px 0px;
            border-right: 1px solid #8B8B8B;
        }

        .intro h3 {
            font-weight: bold;
            margin: 1px;
            font-size: 20px;
            margin: 25px;

        }

        .FAQbox h3 {
            font-weight: bold;
            margin: 1px;
            font-size: 20px;
            margin-bottom: 2rem;


        }

        .FAQbox hr {
            margin: 1rem 0;
        }

        .intro p {

            font: size 18px;
            line-height: 2em;
            padding: 0px 100px 25px 25px;
        }

        .FAQbox p {
            font: size 18px;
            line-height: 2em;
            padding: 0px 100px 25px 25px;
        }

        details {
            padding: 0 1rem;
        }

        details>summary {
            display: flex;
            justify-content: space-between;
            padding: 1rem;
            cursor: pointer;
            list-style-type: decimal;
            font-size: 14px;

            font-weight: 600;
        }

        details>summary::after {
            content: url(./1.png);
            width: 1rem;
            height: 1rem;
            display: inline-flex;
            transition: transform 0.3s ease;

        }

        details[open]>summary::after {
            transform: rotate(90deg);
        }


        details>summary::-webkit-details-marker {
            display: none;
        }

        .details-content {
            font-size: 13px;
            padding: 1rem 1.5rem;
        }

        .details-content>p,
        ol {
            margin: 1rem 0;
            line-height: 3rem;
            color: #868686;
        }

        .getintouch h3 {
            text-align: center;
        }

        .button {
            padding-left: 100px;
        }

        .getintouch {
            box-shadow: 0px 10px 30px 0px rgba(0, 0, 0, 0.1);
            padding: 0 35px 35px 35px;
        }

        .contact-form .form-field {
            position: relative;
            margin: 30px 0px;
        }

        .contact-form .input-text {
            display: block;
            width: 100%;
            height: 100%;
            border-width: 0 0 1px 0;
            border-color: #636363;
            font-size: 18px;
            /* line-height: 26px; */
            font-weight: 400'

        }

        .contact-form .input-text:focus {
            outline: none;
        }

        .contact-form .label {
            position: absolute;
            left: 20px;
            bottom: 11px;
            font-size: 16px;
            line-height: 26px;
            font-weight: 400;
            color: #5E5E5E;
            cursor: text;
            text-transform: capitalization;
            transition: transform 0.2s ease-in-out;

        }

        .contact-form .submit-btn {
            display: inline-block;
            background-image: -webkit-linear-gradient(330deg, rgba(39, 54, 167, 1.00) 0%, rgba(5, 112, 151, 1.00) 100%);
            background-image: -moz-linear-gradient(330deg, rgba(39, 54, 167, 1.00) 0%, rgba(5, 112, 151, 1.00) 100%);
            background-image: -o-linear-gradient(330deg, rgba(39, 54, 167, 1.00) 0%, rgba(5, 112, 151, 1.00) 100%);
            background-image: linear-gradient(120deg, rgba(39, 54, 167, 1.00) 0%, rgba(5, 112, 151, 1.00) 100%);
            color: #fff;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 16px;
            padding: 8px 16px;
            border: none;
            width: 200px;
            height: 100px;
            cursor: pointer;
        }

        .button {
            text-align: center;
            padding-top: 30px;
        }

        .form-control {
            display: block;
            width: 100%;
            height: 100%;
            border-width: 0 0 1px 0;
            border-color: #636363;
            font-size: 18px;
            line-height: 26px;
            font-weight: 400;
        }

        .contact-form+.formlabel,
        .form-control.not-empty+.formlabel {
            transform: translateY(-24px);

        }


        .contact-form .formlabel {
            position: absolute;
            left: 20px;
            top: 11px;
            font-size: 16px;
            line-height: 26px;
            font-weight: 400;
            color: #5E5E5E;
            cursor: text;
            text-transform: capitalization;
            transition: transform 0.2s ease-in-out;

        }
    </style>

</head>
<header class="section_01">

    <div class="contactus">
        <table width="100%">
            <tr>
                <td>
                    <h3>Contact Us</h3>
                </td>

            </tr>
        </table>
    </div>
    <br>

    <content class="section_2">

        <div class="contactus">
            <table width="100%">
                <tr>
                    <td>
                        <iframe src="https://www.google.com/maps/d/embed?mid=1_ZqBYmzqxq42nWMuk3bgQpCTo4M" width="100%" height="480"></iframe>


                    </td>
                </tr>
            </table>
        </div>

        <div class="intro">
            <table width="100%">
                <tbody>
                    <tr>

                        <td class="FAQbox" width="49%" valign="top">

                            <h3>
                                FREQUENTLY ASKED QUESTIONS
                            </h3>
                            <hr />
                            <details>
                                <summary>How to Order?</summary>
                                <div class="details-content">
                                    <p>
                                    <ol>
                                        <li>You Can Browse The Categories To Find An Item Of Interest, Or Simply Search For The Item You Are Looking For In The Search Box On The Homepage.</li>
                                        <li>Once You Have Selected The Item You Want To Order, You Will Have To Click On The ‘add To Cart’ Button, And A Pop-up Will Appear On The Right To Proceed To Checkout, Or If You Want To Keep Shopping, Close The Pop-up And Continue Browsing.</li>
                                        <li>On The Checkout Page, Enter Your Name, Address, Phone Number And Email.</li>
                                        <li>Enter A Password To Create An Account, Or Select The Option To Checkout As A Guest.</li>
                                        <li>Select Between The Standard Delivery, Express Delivery Or Pick-up Methods.</li>
                                        <li>Select Payment Method – Cash, Online Payment Or Bank Deposit. If The Online Payment Method Is Selected, You Will Have To Pay With A Visa Or Mastercard, Via The Internet Payment Gateway.</li>
                                        <li>If The Bank Deposit Method Is Selected, You Will Have To Deposit The Funds Into Our Bank Account With The Account Details Displayed, And Contact Cellentric To Share An Image Of The Slip Via Our Whatsapp Line – 072 672 9729, Along With Your Order Number. Your Order Will Only Be Processed Once The Payment Is Confirmed.</li>
                                        <li>Once Your Order Is Confirmed, You Will Receive An Email With An Order Id And Order Details. You Can Use This As A Reference For Inquiries On Delivery, Or When Collecting Your Order.</li>
                                        <li>For Pick-up, Your Order Can Be Collected From Our Flagship Store At No. 1, Thimbirigasyaya Road, Colombo 05. For Delivery, You Will Receive An Email With A Tracking Number Once It Has Been Dispatched From Our Store.</li>
                                    </ol>
                                    </p>
                                </div>
                            </details>
                            <hr />
                            <details>
                                <summary>How Long Does It Take For The Delivery And What Are The Charges?</summary>
                                <div class="details-content">
                                    <p>
                                        The Standard Delivery Time Of Orders In Colombo Is Within 2 Working Days. Island-wide Delivery Will Be Made Within 3-4 Working Days.
                                        Delivery Charges Within Colombo Will Vary Based On Location, Between Rs 170 And 250. Delivery Charges To Anywhere Outside Of Colombo Will Be Rs 350.
                                        Pick-up Of Orders Is Available Through Monday To Saturday From 10am To 7pm.
                                    </p>
                                </div>
                            </details>
                            <hr />
                            <details>
                                <summary>What Information Should Be Provided And How Secured Is The Website?</summary>
                                <div class="details-content">
                                    <p>
                                        When Placing An Order, For Billing Purposes, We Will Require The Sender’s Full Name, Sender’s Billing Address, Recipient’s Delivery Address, Phone Number Of Sender And Recipient And Sender’s Email Address. All Details Need To Be Provided Accurately. Your Information Will Be Used For Order Reference, Future After Sales Service And Marketing Requirements, Accepted By Your Discretion Only. You Can Find More Information In Our Privacy Policy Page.

                                        All Personal Information Provided Through The Website, Including Credit Card Transaction Details Are Transmitted Through A Secure Server And By Company Policy, We Have Limited The People That Have Physical Access In The Company To Our Database. We Have Taken Necessary Physical, Electronic, And Administrative Precaution To Maintain Security Of The Information And Prevent Unauthorized Use. We Have Used Encryption Technology, Such As Secure Sockets Layer (Ssl) To Protect Your Personal Information Entered When Placing An Order, Which Encrypts Data Such As Your Name, Address, Phone Number, And Credit Card Number. Our Internet Payment Gateways Are Fully Compliant With Payment Card Industry Data Security Standards (PCI DSS) And Supports Both “Mastercard Securecode” And “Verified By Visa” 3d Secure Authentication Solutions.
                                    </p>
                                </div>
                            </details>
                            <hr />
                            <details>
                                <summary>What Is Cellentric Return And Refund Policy?</summary>
                                <div class="details-content">
                                    <p>
                                        We Accept Returns For Products Within A Period Of 7 Days As Long As The Packaging And Contents Of Products Provided Initially Are In The Same Bought Condition, And Not Damaged Or Opened, Including All Accessories And Any Other Parts Associated With The Main Product. Contact Cellentric, And Returns Accepted Can Be;
                                        (i.) Exchanged For Any Other Product Of Equal Value, Or Higher Value Having Paid The Difference, (ii.) Refunded In The Form Of Store Credit, Where You Can Purchase A Product In Future For The Same Value Of The Returned Product(S). Cash Refunds Will Not Be Provided As Per The Company’s Policy, And Any Such Requests Will Only Be Considered Upon Review By The Management.

                                        Returns For Warranty Claims Will Be Accepted For The Due Course Of The Warranty Period, And Upon Inspection And Decision Of The Technical Team, The Product Will Be Replaced, Given That The Nature Of The Issue With The Product Is Covered Under The Warranty, Or Given An Instance Where You Want To Upgrade The Product, We Will Consider The Period It Has Been Used, And 50% Or More Of The Initial Purchase Value Will Be Reduced, And The Difference Will Have To Be Paid To Purchase The Upgrade.

                                    </p>
                                </div>
                            </details>
                            <hr />
                            <details>
                                <summary>What Is The Warranty Period For Electronics?</summary>
                                <div class="details-content">
                                    <p>
                                        All Electronics Will Have A Warranty Period Of 6 Months, And Mobile Phones Will Be Covered For A Period Of 1 Year, Unless Specified Otherwise. For More Information On Our Warranty Policy Visit Our After Sales Services Page And Contact Cellentric For Any Further Clarifications.
                                    </p>
                                </div>
                            </details>
                            <hr />




                        </td>


                        <td class="getintouch" width="51%" valign="top">

                            <h3>GET IN TOUCH</h3>

                            <div class="container">
                                <div class="contact-form row">

                                    <div class="form-field col-lg-6">
                                        <input id="name" class="master_input" type="text" name="name" placeholder="Your Name">
                                       
                                    </div>

                                    <div class="form-field col-lg-6">
                                        <input id="email" class="master_input" type="email" name="email" placeholder="Your Email">
                                        
                                    </div>

                                    <div class="form-field col-lg-12">
                                        <input id="phone" class="master_input" type="phone" name="phone" placeholder="Enter Contact No">
                                       
                                    </div>

                                    <div class="form-field col-lg-12">

                                        <textarea name="message" id="yourinquiry" class="form-control" rows="8" placeholder="Message"></textarea>
                                    </div>

                                    <div class="button">
                                        <button class="button_master btn_primary" >Submit<button>
                                    </div>



                                </div>


                            </div>


                        </td>


                    </tr>
                </tbody>


            </table>



        </div>




        </main>
        </div>
        </div>


        <?php
        include 'includes/footer.php';
        ?>