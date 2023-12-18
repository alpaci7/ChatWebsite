<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="main">
        <h1>Register</h1>
        <form id="form" action="registerPost.php" method="POST">
            <?php if(isset($first_error)){echo $first_error;} ?>
            <input type="text" name="first" placeholder="first name" value="<?php if(isset($_SESSION['register_first'])) {echo $_SESSION['register_first'];}?>"><br>
            
            <?php if(isset($last_error)){echo $last_error;} ?>
            <input type="text" name="last" placeholder="last name" value="<?php if(isset($_SESSION['register_last'])) {echo $_SESSION['register_last'];}?>"><br>

            <?php if(isset($user_error)){echo $user_error;} ?>
            <input type="text" name="username" placeholder="username" value="<?php if(isset($_SESSION['register_username'])) {echo $_SESSION['register_username'];}?>"><br>
            
            <?php if(isset($pass_error)){echo $pass_error;} ?>
            <input type="password" name="password" placeholder="new password" value="<?php if(isset($_SESSION['register_password'])) {echo $_SESSION['register_password'];}?>"><br>
            
            <?php if(isset($email_error)){echo $email_error;} ?>
            <input type="email" name="email" placeholder="email" value="<?php if(isset($_SESSION['register_email'])) {echo $_SESSION['register_email'];}?>"><br>
            
            <?php if(isset($phone_error)){echo $phone_error;} ?>
            <input type="text" name="phone" placeholder="phone number" value="<?php if(isset($_SESSION['register_phone'])) {echo $_SESSION['register_phone'];}?>"><br>
            
            <?php if(isset($gender_error)){echo $gender_error;} ?>
            <h7>Gender :</h7>
            <select name="gender">
                <option disabled selected>Choose</option>
                <option value="male" <?php if(isset($_SESSION['register_gender']) && $_SESSION['register_gender']=='male') : ?> selected="selected"<?php endif;?>>Male</option>
                <option value="female" <?php if(isset($_SESSION['register_gender']) && $_SESSION['register_gender'] == 'female') : ?> selected="selected" <?php endif;?>>Female</option>
            </select><br>
            
            <?php if(isset($birthday_error)){echo $birthday_error;} ?>
            <h7>Birthday :</h7>
            <select name="birthday_month">
                <option disabled selected>Month</option>
                <option value="1" <?php if(isset($_SESSION['register_birthday_month']) && $_SESSION['register_birthday_month']=='1') : ?> selected="selected"<?php endif;?>>Jan</option>
                <option value="2" <?php if(isset($_SESSION['register_birthday_month']) && $_SESSION['register_birthday_month']=='2') : ?> selected="selected"<?php endif;?>>Feb</option>
                <option value="3" <?php if(isset($_SESSION['register_birthday_month']) && $_SESSION['register_birthday_month']=='3') : ?> selected="selected"<?php endif;?>>Mar</option>
                <option value="4" <?php if(isset($_SESSION['register_birthday_month']) && $_SESSION['register_birthday_month']=='4') : ?> selected="selected"<?php endif;?>>Apr</option>
                <option value="5" <?php if(isset($_SESSION['register_birthday_month']) && $_SESSION['register_birthday_month']=='5') : ?> selected="selected"<?php endif;?>>May</option>
                <option value="6" <?php if(isset($_SESSION['register_birthday_month']) && $_SESSION['register_birthday_month']=='6') : ?> selected="selected"<?php endif;?>>Jun</option>
                <option value="7" <?php if(isset($_SESSION['register_birthday_month']) && $_SESSION['register_birthday_month']=='7') : ?> selected="selected"<?php endif;?>>Jul</option>
                <option value="8" <?php if(isset($_SESSION['register_birthday_month']) && $_SESSION['register_birthday_month']=='8') : ?> selected="selected"<?php endif;?>>Aug</option>
                <option value="9" <?php if(isset($_SESSION['register_birthday_month']) && $_SESSION['register_birthday_month']=='9') : ?> selected="selected"<?php endif;?>>Sep</option>
                <option value="10" <?php if(isset($_SESSION['register_birthday_month']) && $_SESSION['register_birthday_month']=='10') : ?> selected="selected"<?php endif;?>>Oct</option>
                <option value="11" <?php if(isset($_SESSION['register_birthday_month']) && $_SESSION['register_birthday_month']=='11') : ?> selected="selected"<?php endif;?>>Nov</option>
                <option value="12" <?php if(isset($_SESSION['register_birthday_month']) && $_SESSION['register_birthday_month']=='12') : ?> selected="selected"<?php endif;?>>Dec</option>
            </select>
            <select name="birthday_day">
                <option disabled selected>Day</option>
                <option value="1" <?php if(isset($_SESSION['register_birthday_day']) && $_SESSION['register_birthday_day']=='1') : ?> selected="selected"<?php endif;?>>1</option>
                <option value="2" <?php if(isset($_SESSION['register_birthday_day']) && $_SESSION['register_birthday_day']=='2') : ?> selected="selected"<?php endif;?>>2</option>
                <option value="3" <?php if(isset($_SESSION['register_birthday_day']) && $_SESSION['register_birthday_day']=='3') : ?> selected="selected"<?php endif;?>>3</option>
                <option value="4" <?php if(isset($_SESSION['register_birthday_day']) && $_SESSION['register_birthday_day']=='4') : ?> selected="selected"<?php endif;?>>4</option>
                <option value="5" <?php if(isset($_SESSION['register_birthday_day']) && $_SESSION['register_birthday_day']=='5') : ?> selected="selected"<?php endif;?>>5</option>
                <option value="6" <?php if(isset($_SESSION['register_birthday_day']) && $_SESSION['register_birthday_day']=='6') : ?> selected="selected"<?php endif;?>>6</option>
                <option value="7" <?php if(isset($_SESSION['register_birthday_day']) && $_SESSION['register_birthday_day']=='7') : ?> selected="selected"<?php endif;?>>7</option>
                <option value="8" <?php if(isset($_SESSION['register_birthday_day']) && $_SESSION['register_birthday_day']=='8') : ?> selected="selected"<?php endif;?>>8</option>
                <option value="9" <?php if(isset($_SESSION['register_birthday_day']) && $_SESSION['register_birthday_day']=='9') : ?> selected="selected"<?php endif;?>>9</option>
                <option value="10" <?php if(isset($_SESSION['register_birthday_day']) && $_SESSION['register_birthday_day']=='10') : ?> selected="selected"<?php endif;?>>10</option>
                <option value="11" <?php if(isset($_SESSION['register_birthday_day']) && $_SESSION['register_birthday_day']=='11') : ?> selected="selected"<?php endif;?>>11</option>
                <option value="12" <?php if(isset($_SESSION['register_birthday_day']) && $_SESSION['register_birthday_day']=='12') : ?> selected="selected"<?php endif;?>>12</option>
                <option value="13" <?php if(isset($_SESSION['register_birthday_day']) && $_SESSION['register_birthday_day']=='13') : ?> selected="selected"<?php endif;?>>13</option>
                <option value="14" <?php if(isset($_SESSION['register_birthday_day']) && $_SESSION['register_birthday_day']=='14') : ?> selected="selected"<?php endif;?>>14</option>
                <option value="15" <?php if(isset($_SESSION['register_birthday_day']) && $_SESSION['register_birthday_day']=='15') : ?> selected="selected"<?php endif;?>>15</option>
                <option value="16" <?php if(isset($_SESSION['register_birthday_day']) && $_SESSION['register_birthday_day']=='16') : ?> selected="selected"<?php endif;?>>16</option>
                <option value="17" <?php if(isset($_SESSION['register_birthday_day']) && $_SESSION['register_birthday_day']=='17') : ?> selected="selected"<?php endif;?>>17</option>
                <option value="18" <?php if(isset($_SESSION['register_birthday_day']) && $_SESSION['register_birthday_day']=='18') : ?> selected="selected"<?php endif;?>>18</option>
                <option value="19" <?php if(isset($_SESSION['register_birthday_day']) && $_SESSION['register_birthday_day']=='19') : ?> selected="selected"<?php endif;?>>19</option>
                <option value="20" <?php if(isset($_SESSION['register_birthday_day']) && $_SESSION['register_birthday_day']=='20') : ?> selected="selected"<?php endif;?>>20</option>
                <option value="21" <?php if(isset($_SESSION['register_birthday_day']) && $_SESSION['register_birthday_day']=='21') : ?> selected="selected"<?php endif;?>>21</option>
                <option value="22" <?php if(isset($_SESSION['register_birthday_day']) && $_SESSION['register_birthday_day']=='22') : ?> selected="selected"<?php endif;?>>22</option>
                <option value="23" <?php if(isset($_SESSION['register_birthday_day']) && $_SESSION['register_birthday_day']=='23') : ?> selected="selected"<?php endif;?>>23</option>
                <option value="24" <?php if(isset($_SESSION['register_birthday_day']) && $_SESSION['register_birthday_day']=='24') : ?> selected="selected"<?php endif;?>>24</option>
                <option value="25" <?php if(isset($_SESSION['register_birthday_day']) && $_SESSION['register_birthday_day']=='25') : ?> selected="selected"<?php endif;?>>25</option>
                <option value="26" <?php if(isset($_SESSION['register_birthday_day']) && $_SESSION['register_birthday_day']=='26') : ?> selected="selected"<?php endif;?>>26</option>
                <option value="27" <?php if(isset($_SESSION['register_birthday_day']) && $_SESSION['register_birthday_day']=='27') : ?> selected="selected"<?php endif;?>>27</option>
                <option value="28" <?php if(isset($_SESSION['register_birthday_day']) && $_SESSION['register_birthday_day']=='28') : ?> selected="selected"<?php endif;?>>28</option>
                <option value="29" <?php if(isset($_SESSION['register_birthday_day']) && $_SESSION['register_birthday_day']=='29') : ?> selected="selected"<?php endif;?>>29</option>
                <option value="30" <?php if(isset($_SESSION['register_birthday_day']) && $_SESSION['register_birthday_day']=='30') : ?> selected="selected"<?php endif;?>>30</option>
                <option value="31" <?php if(isset($_SESSION['register_birthday_day']) && $_SESSION['register_birthday_day']=='31') : ?> selected="selected"<?php endif;?>>31</option>
            </select>
            <select name="birthday_year">
                <option disabled selected>Year</option>
                <option value="2023" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='2023') : ?> selected="selected"<?php endif;?>>2023</option>
                <option value="2022" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='2022') : ?> selected="selected"<?php endif;?>>2022</option>
                <option value="2021" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='2021') : ?> selected="selected"<?php endif;?>>2021</option>
                <option value="2020" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='2020') : ?> selected="selected"<?php endif;?>>2020</option>
                <option value="2019" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='2019') : ?> selected="selected"<?php endif;?>>2019</option>
                <option value="2018" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='2018') : ?> selected="selected"<?php endif;?>>2018</option>
                <option value="2017" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='2017') : ?> selected="selected"<?php endif;?>>2017</option>
                <option value="2016" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='2016') : ?> selected="selected"<?php endif;?>>2016</option>
                <option value="2015" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='2015') : ?> selected="selected"<?php endif;?>>2015</option>
                <option value="2014" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='2014') : ?> selected="selected"<?php endif;?>>2014</option>
                <option value="2013" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='2013') : ?> selected="selected"<?php endif;?>>2013</option>
                <option value="2012" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='2012') : ?> selected="selected"<?php endif;?>>2012</option>
                <option value="2011" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='2011') : ?> selected="selected"<?php endif;?>>2011</option>
                <option value="2010" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='2010') : ?> selected="selected"<?php endif;?>>2010</option>
                <option value="2009" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='2009') : ?> selected="selected"<?php endif;?>>2009</option>
                <option value="2008" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='2008') : ?> selected="selected"<?php endif;?>>2008</option>
                <option value="2007" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='2007') : ?> selected="selected"<?php endif;?>>2007</option>
                <option value="2006" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='2006') : ?> selected="selected"<?php endif;?>>2006</option>
                <option value="2005" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='2005') : ?> selected="selected"<?php endif;?>>2005</option>
                <option value="2004" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='2004') : ?> selected="selected"<?php endif;?>>2004</option>
                <option value="2003" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='2003') : ?> selected="selected"<?php endif;?>>2003</option>
                <option value="2002" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='2002') : ?> selected="selected"<?php endif;?>>2002</option>
                <option value="2001" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='2001') : ?> selected="selected"<?php endif;?>>2001</option>
                <option value="2000" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='2000') : ?> selected="selected"<?php endif;?>>2000</option>
                <option value="1999" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1999') : ?> selected="selected"<?php endif;?>>1999</option>
                <option value="1998" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1998') : ?> selected="selected"<?php endif;?>>1998</option>
                <option value="1997" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1997') : ?> selected="selected"<?php endif;?>>1997</option>
                <option value="1996" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1996') : ?> selected="selected"<?php endif;?>>1996</option>
                <option value="1995" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1995') : ?> selected="selected"<?php endif;?>>1995</option>
                <option value="1994" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1994') : ?> selected="selected"<?php endif;?>>1994</option>
                <option value="1993" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1993') : ?> selected="selected"<?php endif;?>>1993</option>
                <option value="1992" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1992') : ?> selected="selected"<?php endif;?>>1992</option>
                <option value="1991" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1991') : ?> selected="selected"<?php endif;?>>1991</option>
                <option value="1990" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1990') : ?> selected="selected"<?php endif;?>>1990</option>
                <option value="1989" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1989') : ?> selected="selected"<?php endif;?>>1989</option>
                <option value="1988" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1988') : ?> selected="selected"<?php endif;?>>1988</option>
                <option value="1987" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1987') : ?> selected="selected"<?php endif;?>>1987</option>
                <option value="1986" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1986') : ?> selected="selected"<?php endif;?>>1986</option>
                <option value="1985" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1985') : ?> selected="selected"<?php endif;?>>1985</option>
                <option value="1984" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1984') : ?> selected="selected"<?php endif;?>>1984</option>
                <option value="1983" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1983') : ?> selected="selected"<?php endif;?>>1983</option>
                <option value="1982" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1982') : ?> selected="selected"<?php endif;?>>1982</option>
                <option value="1981" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1981') : ?> selected="selected"<?php endif;?>>1981</option>
                <option value="1980" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1980') : ?> selected="selected"<?php endif;?>>1980</option>
                <option value="1979" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1979') : ?> selected="selected"<?php endif;?>>1979</option>
                <option value="1978" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1978') : ?> selected="selected"<?php endif;?>>1978</option>
                <option value="1977" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1977') : ?> selected="selected"<?php endif;?>>1977</option>
                <option value="1976" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1976') : ?> selected="selected"<?php endif;?>>1976</option>
                <option value="1975" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1975') : ?> selected="selected"<?php endif;?>>1975</option>
                <option value="1974" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1974') : ?> selected="selected"<?php endif;?>>1974</option>
                <option value="1973" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1973') : ?> selected="selected"<?php endif;?>>1973</option>
                <option value="1972" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1972') : ?> selected="selected"<?php endif;?>>1972</option>
                <option value="1971" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1971') : ?> selected="selected"<?php endif;?>>1971</option>
                <option value="1970" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1970') : ?> selected="selected"<?php endif;?>>1970</option>
                <option value="1969" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1969') : ?> selected="selected"<?php endif;?>>1969</option>
                <option value="1968" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1968') : ?> selected="selected"<?php endif;?>>1968</option>
                <option value="1967" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1967') : ?> selected="selected"<?php endif;?>>1967</option>
                <option value="1966" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1966') : ?> selected="selected"<?php endif;?>>1966</option>
                <option value="1965" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1965') : ?> selected="selected"<?php endif;?>>1965</option>
                <option value="1964" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1964') : ?> selected="selected"<?php endif;?>>1964</option>
                <option value="1963" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1963') : ?> selected="selected"<?php endif;?>>1963</option>
                <option value="1962" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1962') : ?> selected="selected"<?php endif;?>>1962</option>
                <option value="1961" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1961') : ?> selected="selected"<?php endif;?>>1961</option>
                <option value="1960" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1960') : ?> selected="selected"<?php endif;?>>1960</option>
                <option value="1959" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1959') : ?> selected="selected"<?php endif;?>>1959</option>
                <option value="1958" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1958') : ?> selected="selected"<?php endif;?>>1958</option>
                <option value="1957" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1957') : ?> selected="selected"<?php endif;?>>1957</option>
                <option value="1956" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1956') : ?> selected="selected"<?php endif;?>>1956</option>
                <option value="1955" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1955') : ?> selected="selected"<?php endif;?>>1955</option>
                <option value="1954" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1954') : ?> selected="selected"<?php endif;?>>1954</option>
                <option value="1953" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1953') : ?> selected="selected"<?php endif;?>>1953</option>
                <option value="1952" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1952') : ?> selected="selected"<?php endif;?>>1952</option>
                <option value="1951" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1951') : ?> selected="selected"<?php endif;?>>1951</option>
                <option value="1950" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1950') : ?> selected="selected"<?php endif;?>>1950</option>
                <option value="1949" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1949') : ?> selected="selected"<?php endif;?>>1949</option>
                <option value="1948" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1948') : ?> selected="selected"<?php endif;?>>1948</option>
                <option value="1947" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1947') : ?> selected="selected"<?php endif;?>>1947</option>
                <option value="1946" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1946') : ?> selected="selected"<?php endif;?>>1946</option>
                <option value="1945" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1945') : ?> selected="selected"<?php endif;?>>1945</option>
                <option value="1944" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1944') : ?> selected="selected"<?php endif;?>>1944</option>
                <option value="1943" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1943') : ?> selected="selected"<?php endif;?>>1943</option>
                <option value="1942" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1942') : ?> selected="selected"<?php endif;?>>1942</option>
                <option value="1941" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1941') : ?> selected="selected"<?php endif;?>>1941</option>
                <option value="1940" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1940') : ?> selected="selected"<?php endif;?>>1940</option>
                <option value="1939" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1939') : ?> selected="selected"<?php endif;?>>1939</option>
                <option value="1938" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1938') : ?> selected="selected"<?php endif;?>>1938</option>
                <option value="1937" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1937') : ?> selected="selected"<?php endif;?>>1937</option>
                <option value="1936" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1936') : ?> selected="selected"<?php endif;?>>1936</option>
                <option value="1935" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1935') : ?> selected="selected"<?php endif;?>>1935</option>
                <option value="1934" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1934') : ?> selected="selected"<?php endif;?>>1934</option>
                <option value="1933" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1933') : ?> selected="selected"<?php endif;?>>1933</option>
                <option value="1932" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1932') : ?> selected="selected"<?php endif;?>>1932</option>
                <option value="1931" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1931') : ?> selected="selected"<?php endif;?>>1931</option>
                <option value="1930" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1930') : ?> selected="selected"<?php endif;?>>1930</option>
                <option value="1929" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1929') : ?> selected="selected"<?php endif;?>>1929</option>
                <option value="1928" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1928') : ?> selected="selected"<?php endif;?>>1928</option>
                <option value="1927" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1927') : ?> selected="selected"<?php endif;?>>1927</option>
                <option value="1926" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1926') : ?> selected="selected"<?php endif;?>>1926</option>
                <option value="1925" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1925') : ?> selected="selected"<?php endif;?>>1925</option>
                <option value="1924" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1924') : ?> selected="selected"<?php endif;?>>1924</option>
                <option value="1923" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1923') : ?> selected="selected"<?php endif;?>>1923</option>
                <option value="1922" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1922') : ?> selected="selected"<?php endif;?>>1922</option>
                <option value="1921" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1921') : ?> selected="selected"<?php endif;?>>1921</option>
                <option value="1920" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1920') : ?> selected="selected"<?php endif;?>>1920</option>
                <option value="1919" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1919') : ?> selected="selected"<?php endif;?>>1919</option>
                <option value="1918" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1918') : ?> selected="selected"<?php endif;?>>1918</option>
                <option value="1917" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1917') : ?> selected="selected"<?php endif;?>>1917</option>
                <option value="1916" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1916') : ?> selected="selected"<?php endif;?>>1916</option>
                <option value="1915" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1915') : ?> selected="selected"<?php endif;?>>1915</option>
                <option value="1914" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1914') : ?> selected="selected"<?php endif;?>>1914</option>
                <option value="1913" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1913') : ?> selected="selected"<?php endif;?>>1913</option>
                <option value="1912" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1912') : ?> selected="selected"<?php endif;?>>1912</option>
                <option value="1911" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1911') : ?> selected="selected"<?php endif;?>>1911</option>
                <option value="1910" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1910') : ?> selected="selected"<?php endif;?>>1910</option>
                <option value="1909" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1909') : ?> selected="selected"<?php endif;?>>1909</option>
                <option value="1908" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1908') : ?> selected="selected"<?php endif;?>>1908</option>
                <option value="1907" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1907') : ?> selected="selected"<?php endif;?>>1907</option>
                <option value="1906" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1906') : ?> selected="selected"<?php endif;?>>1906</option>
                <option value="1905" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1905') : ?> selected="selected"<?php endif;?>>1905</option>
                <option value="1904" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1904') : ?> selected="selected"<?php endif;?>>1904</option>
                <option value="1903" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1903') : ?> selected="selected"<?php endif;?>>1903</option>
                <option value="1902" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1902') : ?> selected="selected"<?php endif;?>>1902</option>
                <option value="1901" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1901') : ?> selected="selected"<?php endif;?>>1901</option>
                <option value="1900" <?php if(isset($_SESSION['register_birthday_year']) && $_SESSION['register_birthday_year']=='1900') : ?> selected="selected"<?php endif;?>>1900</option>
            </select><br>
            <button type="submit" name="submit">Register</button>
        </form>
        <h5>Or</h5>
        <button onclick="window.location.href='index.php'">Log In</a>
    </div>
</body>
</html>