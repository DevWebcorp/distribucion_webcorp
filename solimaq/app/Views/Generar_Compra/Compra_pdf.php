<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Lista de cotizaciones</title>
</head>

<body>
    <header class="clearfix">
        <div class="col-md-12 row">
            <div  class="col-md-6">
                <img src="../assets/img/logo_b.jpg" style="width: 50%;">
            </div>

            <div  class="col-md-6">
                <h3>PURCHASE ORDER</h3>
                <p>No.     <span style="text-align: right;"><?php echo date("Ym")?></span></p>
                <p>DATE:    <span><?php echo date("F d,Y")?></span></p>
                <p>CONTACT:     <span><?php echo $data['contact']?></span></p>
               
            </div>
        </div>

        <div id="company" class="clearfix">
            <h6><?php echo $data['marca'];?></h6>
            <p>MR. <span><?php echo $data['name_proveedor'];?></span></p>
            <p>BRAND: </p>
            <p>TEL. <span><?php echo $data['phone'];?></span></p>
            <p>E-MAIL:  <span><?php echo $data['email'];?></span></p>

        </div>
       
    </header>

    <p>Dear Mr.<span><?php echo $data['name_proveedor'];?></span></p>
    <p>We are hereby pleased to send you the purchase order for the following machine.</p>
    <h4>MACHINERY AND PRICE</h4>

        <table id="customers"> 
            <thead>
                <tr>
                    <th class="wd-15p">ITEM</th>
                    <th class="wd-15p">NAME</th>
                    <th class="wd-15p">QT.</th>
                    <th class="wd-15p">PRICE</th>
                </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    <img style="width: 25%;" src="../public/images/<?php echo $data['media_path'];?> " class="img-thumbnail"/>
                   </td>
                <td><?php echo $data['name'];?></td>
                <td>1</td>
                <td>USD $<?php $precio = floatval($data['price']);
                echo number_format($precio,2, ".", ",");?></td>
            </tr>
            <tr>
                <td id="proveedor"><?php echo $data['name_proveedor'];?></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>ADVANCE PAYMENT</td>
                <td><?php echo $data['before_Payment'];?> %</td>
                <td>PRICE</td>
                <td>USD $<?php $precioantes = floatval($data['advancePaymentPrice']);
                    echo number_format($precioantes,2);?></td>
            </tr>
            <tr>
                <td>BEFORE LOADING</td>
                <td><?php echo $data['before_Loading'];?> %</td>
                <td>PRICE</td>
                <td>USD $<?php $preciocarga = floatval($data['priceBeforeLoading']);
                    echo number_format($preciocarga,2);?></td>
            </tr>
            </tbody>
        </table>

    <br>

    <h4>DETAILS AND FORCED SPECIFICATIONS</h4>
<table id="details_and_specs">
    <tbody>
    <tr>
        <td>MODEL NAME ON PLATE</td>
        <td><?php echo $data['MODEL'];?></td>
    </tr>
    <tr>
        <td>SERIAL NUMBER</td>
        <td><?php echo $data['SERIAL_NUMBER'];?></td>
    </tr>
    <tr>
        <td>CAPACITY</td>
        <td><?php echo $data['CAPACITY'];?></td>
    </tr>
    <tr>
        <td>VOLTAGE</td>
        <td><?php echo $data['VOLTAGE'];?></td>
    </tr>
    <tr>
        <td>COLOR OR PAINT</td>
        <td><?php echo $data['COLOR'];?></td>
    </tr>
    <tr>
        <td>DELIVERY TIME</td>
        <td><?php echo $data['DELIVERY'];?> DAYS</td>
    </tr>
    <tr>
        <td>OTHER DETAILS</td>
        <td><?php echo $data['OTHER'];?></td>
    </tr>

    </tbody>
</table>

<br>

    <div id="footersolimaq">
        <div class="me-5 d-none d-lg-block">
            <p>SOLIMAQ PRODUCTOS DE RECICLAJE S.A. DE C.V.<br>Concepcion Béistegui 1402
            <br>Col. Del Valle<br>Del. Benito Juárez <br>C.P. 03020</p>
        </div>
    </div>

</body>





</html>

<style>

.col-md-12{
    width: 100%;

}

.col-md-6{
    width: 50%;
    float: left;

}

h3{
    font-family: Arial, Helvetica, sans-serif;
    font-size: 14px;
    word-spacing: 2px;
    color: #000000;
    font-style: normal;
    font-variant: normal;
    text-transform: uppercase;
    text-decoration-line: underline;
    text-decoration-color: rgb(179,255,98);
    text-decoration-thickness: 2px;
}

h4{
    font-family: Arial, Helvetica, sans-serif;
    font-size: 15px;
    letter-spacing: 2px;
    word-spacing: 2px;
    color: #757575;
    text-decoration-line: underline;
    text-decoration-color: rgb(179,255,98);
    text-decoration-thickness: 2px;
    font-style: normal;
    font-variant: normal;
    text-transform: uppercase;
}

p{
    font-family: Arial, Helvetica, sans-serif;
    font-size: 12px;
    word-spacing: 2px;
    color: #000000;
    font-weight: 400;
    text-decoration: none;
    font-style: normal;
    font-variant: normal;
    text-transform: none;
}

#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  font-family: Arial, sans-serif;
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color: #4d4d4d;
  color: white;
}

#proveedor{
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: center;
    background-color: #4d4d4d;
    color: white;
    font-family: Arial, Helvetica, sans-serif;
    text-transform: uppercase;
}

#details_and_specs{
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#details_and_specs td{
    font-size: 12px;
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: center;
    background-color: #4d4d4d;
    color: white;
    font-family: Arial, Helvetica, sans-serif;
    font-weight: 700;
    text-transform: uppercase;
}

#footersolimaq p{
    font-family: Arial, Helvetica, sans-serif;
    font-size: 8px;
    letter-spacing: 0px;
    word-spacing: 0px;
    color: #000000;
    font-weight: 400;
    text-decoration: none;
    font-style: normal;
    font-variant: normal;
    text-transform: none;
}


</style>