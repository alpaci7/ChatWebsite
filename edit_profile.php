<?php 
    session_start();
    include('inc/connection.php');
    if(isset($_SESSION['id']) && isset($_SESSION['username'])){
        $id = $_SESSION['id'];
        $username = $_SESSION['username'];
        $info = mysqli_query($conn,"SELECT * FROM users WHERE username='$username' AND id='$id'");
        while($data = mysqli_fetch_array($info)){
            $id = $data['id'];
            $first = $data['first'];
            $last = $data['last'];
            $username = $data['username'];
            $password = $data['password'];
            $email = $data['email'];
            $gender = $data['gender']; 
            $phone = $data['phone']; 
            $birthday = $data['birthday'];
            $profile_picture = $data['picture'];
            $cv = $data['cv'];

            $birthday_explode = explode('-',$birthday);
            $birthday_day = $birthday_explode[0];
            $birthday_month = $birthday_explode[1];
            $birthday_year = $birthday_explode[2];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit profile</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="main">
        <form action="edit_profile_post.php" method="POST" enctype="multipart/form-data">
            <?php if(isset($image_error)){echo $image_error;}?>    
            <?php echo "<img id='photo' src='images/".$profile_picture."' alt='Image not found'>"; ?><br>
            <label for="picture">Profile picture :</label>
            <input type="file" name="picture" id="picture">
            <br>
            <?php if(isset($first_error)) echo $first_error;?>
            <label for="first">First name :</label>
            <input type="text" name="first" id="first" placeholder="first name"  value="<?php echo $first;?>">
            <br>
            <?php if(isset($last_error)) echo $last_error;?>
            <label for="last">Last name :</label>
            <input type="text" name="last" id="last" placeholder="last name"  value="<?php echo $last;?>">
            <br>
            <?php if(isset($user_error)) echo $user_error;?>
            <label for="username">username :</label>
            <input type="text" name="username" id="username" placeholder="username"  value="<?php echo $username;?>">
            <br>
            <?php if(isset($pass_error)) echo $pass_error;?>
            <label for="password">password :</label>
            <input type="text" name="password" id="password" placeholder="password"  value="<?php echo $password;?>">
            <br>
            <?php if(isset($email_error)) echo $email_error;?>
            <label for="email">email :</label>
            <input type="email" name="email" id="email" placeholder="email" value="<?php echo $email;?>">
            <br>
            <?php if(isset($phone_error)) echo $phone_error;?>
            <label for="phone">username :</label>
            <input type="text" name="phone" id="phone" placeholder="phone number"  value="<?php echo $phone;?>">
            <br>
            <?php if(isset($gender_error)) echo $gender_error;?>
            <label for="gender">Gender :</label>
            <select name="gender" id="gender">
                <option disabled>choose</option>
                <option value="male" >Male</option>
                <option value="female" <?php if($gender=='female') : ?> selected="selected"<?php endif;?>>Female</option>
            </select>
            <br>
            <?php if(isset($birthday_error)) echo $birthday_error;?>
            <label for="birthday">Birthday :</label>
            <select name="birthday_month" id="birthday">
                <option disabled >Month</option>
                <option value="1" <?php if($birthday_month=='1') : ?> selected="selected"<?php endif;?>>Jan</option>
                <option value="2" <?php if($birthday_month=='2') : ?> selected="selected"<?php endif;?>>Feb</option>
                <option value="3" <?php if($birthday_month=='3') : ?> selected="selected"<?php endif;?>>Mar</option>
                <option value="4" <?php if($birthday_month=='4') : ?> selected="selected"<?php endif;?>>Apr</option>
                <option value="5" <?php if($birthday_month=='5') : ?> selected="selected"<?php endif;?>>May</option>
                <option value="6" <?php if($birthday_month=='6') : ?> selected="selected"<?php endif;?>>Jun</option>
                <option value="7" <?php if($birthday_month=='7') : ?> selected="selected"<?php endif;?>>Jul</option>
                <option value="8" <?php if($birthday_month=='8') : ?> selected="selected"<?php endif;?>>Aug</option>
                <option value="9" <?php if($birthday_month=='9') : ?> selected="selected"<?php endif;?>>Sep</option>
                <option value="10" <?php if($birthday_month=='10') : ?> selected="selected"<?php endif;?>>Oct</option>
                <option value="11" <?php if($birthday_month=='11') : ?> selected="selected"<?php endif;?>>Nov</option>
                <option value="12" <?php if($birthday_month=='12') : ?> selected="selected"<?php endif;?>>Dec</option>
            </select>
            <select name="birthday_day" id="birthday">
                <option disabled>Day</option>
                <option value="1" <?php if($birthday_day=='1') : ?> selected="selected"<?php endif;?>>1</option>
                <option value="2" <?php if($birthday_day=='2') : ?> selected="selected"<?php endif;?>>2</option>
                <option value="3" <?php if($birthday_day=='3') : ?> selected="selected"<?php endif;?>>3</option>
                <option value="4" <?php if($birthday_day=='4') : ?> selected="selected"<?php endif;?>>4</option>
                <option value="5" <?php if($birthday_day=='5') : ?> selected="selected"<?php endif;?>>5</option>
                <option value="6" <?php if($birthday_day=='6') : ?> selected="selected"<?php endif;?>>6</option>
                <option value="7" <?php if($birthday_day=='7') : ?> selected="selected"<?php endif;?>>7</option>
                <option value="8" <?php if($birthday_day=='8') : ?> selected="selected"<?php endif;?>>8</option>
                <option value="9" <?php if($birthday_day=='9') : ?> selected="selected"<?php endif;?>>9</option>
                <option value="10" <?php if($birthday_day=='10') : ?> selected="selected"<?php endif;?>>10</option>
                <option value="11" <?php if($birthday_day=='11') : ?> selected="selected"<?php endif;?>>11</option>
                <option value="12" <?php if($birthday_day=='12') : ?> selected="selected"<?php endif;?>>12</option>
                <option value="13" <?php if($birthday_day=='13') : ?> selected="selected"<?php endif;?>>13</option>
                <option value="14" <?php if($birthday_day=='14') : ?> selected="selected"<?php endif;?>>14</option>
                <option value="15" <?php if($birthday_day=='15') : ?> selected="selected"<?php endif;?>>15</option>
                <option value="16" <?php if($birthday_day=='16') : ?> selected="selected"<?php endif;?>>16</option>
                <option value="17" <?php if($birthday_day=='17') : ?> selected="selected"<?php endif;?>>17</option>
                <option value="18" <?php if($birthday_day=='18') : ?> selected="selected"<?php endif;?>>18</option>
                <option value="19" <?php if($birthday_day=='19') : ?> selected="selected"<?php endif;?>>19</option>
                <option value="20" <?php if($birthday_day=='20') : ?> selected="selected"<?php endif;?>>20</option>
                <option value="21" <?php if($birthday_day=='21') : ?> selected="selected"<?php endif;?>>21</option>
                <option value="22" <?php if($birthday_day=='22') : ?> selected="selected"<?php endif;?>>22</option>
                <option value="23" <?php if($birthday_day=='23') : ?> selected="selected"<?php endif;?>>23</option>
                <option value="24" <?php if($birthday_day=='24') : ?> selected="selected"<?php endif;?>>24</option>
                <option value="25" <?php if($birthday_day=='25') : ?> selected="selected"<?php endif;?>>25</option>
                <option value="26" <?php if($birthday_day=='26') : ?> selected="selected"<?php endif;?>>26</option>
                <option value="27" <?php if($birthday_day=='27') : ?> selected="selected"<?php endif;?>>27</option>
                <option value="28" <?php if($birthday_day=='28') : ?> selected="selected"<?php endif;?>>28</option>
                <option value="29" <?php if($birthday_day=='29') : ?> selected="selected"<?php endif;?>>29</option>
                <option value="30" <?php if($birthday_day=='30') : ?> selected="selected"<?php endif;?>>30</option>
                <option value="31" <?php if($birthday_day=='31') : ?> selected="selected"<?php endif;?>>31</option>
            </select>
            <select name="birthday_year" id="birthday">
                <option disabled>Year</option>
                <option value="2023" <?php if($birthday_year=='2023') : ?> selected="selected"<?php endif;?>>2023</option>
                <option value="2022" <?php if($birthday_year=='2022') : ?> selected="selected"<?php endif;?>>2022</option>
                <option value="2021" <?php if($birthday_year=='2021') : ?> selected="selected"<?php endif;?>>2021</option>
                <option value="2020" <?php if($birthday_year=='2020') : ?> selected="selected"<?php endif;?>>2020</option>
                <option value="2019" <?php if($birthday_year=='2019') : ?> selected="selected"<?php endif;?>>2019</option>
                <option value="2018" <?php if($birthday_year=='2018') : ?> selected="selected"<?php endif;?>>2018</option>
                <option value="2017" <?php if($birthday_year=='2017') : ?> selected="selected"<?php endif;?>>2017</option>
                <option value="2016" <?php if($birthday_year=='2016') : ?> selected="selected"<?php endif;?>>2016</option>
                <option value="2015" <?php if($birthday_year=='2015') : ?> selected="selected"<?php endif;?>>2015</option>
                <option value="2014" <?php if($birthday_year=='2014') : ?> selected="selected"<?php endif;?>>2014</option>
                <option value="2013" <?php if($birthday_year=='2013') : ?> selected="selected"<?php endif;?>>2013</option>
                <option value="2012" <?php if($birthday_year=='2012') : ?> selected="selected"<?php endif;?>>2012</option>
                <option value="2011" <?php if($birthday_year=='2011') : ?> selected="selected"<?php endif;?>>2011</option>
                <option value="2010" <?php if($birthday_year=='2010') : ?> selected="selected"<?php endif;?>>2010</option>
                <option value="2009" <?php if($birthday_year=='2009') : ?> selected="selected"<?php endif;?>>2009</option>
                <option value="2008" <?php if($birthday_year=='2008') : ?> selected="selected"<?php endif;?>>2008</option>
                <option value="2007" <?php if($birthday_year=='2007') : ?> selected="selected"<?php endif;?>>2007</option>
                <option value="2006" <?php if($birthday_year=='2006') : ?> selected="selected"<?php endif;?>>2006</option>
                <option value="2005" <?php if($birthday_year=='2005') : ?> selected="selected"<?php endif;?>>2005</option>
                <option value="2004" <?php if($birthday_year=='2004') : ?> selected="selected"<?php endif;?>>2004</option>
                <option value="2003" <?php if($birthday_year=='2003') : ?> selected="selected"<?php endif;?>>2003</option>
                <option value="2002" <?php if($birthday_year=='2002') : ?> selected="selected"<?php endif;?>>2002</option>
                <option value="2001" <?php if($birthday_year=='2001') : ?> selected="selected"<?php endif;?>>2001</option>
                <option value="2000" <?php if($birthday_year=='2000') : ?> selected="selected"<?php endif;?>>2000</option>
                <option value="1999" <?php if($birthday_year=='1999') : ?> selected="selected"<?php endif;?>>1999</option>
                <option value="1998" <?php if($birthday_year=='1998') : ?> selected="selected"<?php endif;?>>1998</option>
                <option value="1997" <?php if($birthday_year=='1997') : ?> selected="selected"<?php endif;?>>1997</option>
                <option value="1996" <?php if($birthday_year=='1996') : ?> selected="selected"<?php endif;?>>1996</option>
                <option value="1995" <?php if($birthday_year=='1995') : ?> selected="selected"<?php endif;?>>1995</option>
                <option value="1994" <?php if($birthday_year=='1994') : ?> selected="selected"<?php endif;?>>1994</option>
                <option value="1993" <?php if($birthday_year=='1993') : ?> selected="selected"<?php endif;?>>1993</option>
                <option value="1992" <?php if($birthday_year=='1992') : ?> selected="selected"<?php endif;?>>1992</option>
                <option value="1991" <?php if($birthday_year=='1991') : ?> selected="selected"<?php endif;?>>1991</option>
                <option value="1990" <?php if($birthday_year=='1990') : ?> selected="selected"<?php endif;?>>1990</option>
                <option value="1989" <?php if($birthday_year=='1989') : ?> selected="selected"<?php endif;?>>1989</option>
                <option value="1988" <?php if($birthday_year=='1988') : ?> selected="selected"<?php endif;?>>1988</option>
                <option value="1987" <?php if($birthday_year=='1987') : ?> selected="selected"<?php endif;?>>1987</option>
                <option value="1986" <?php if($birthday_year=='1986') : ?> selected="selected"<?php endif;?>>1986</option>
                <option value="1985" <?php if($birthday_year=='1985') : ?> selected="selected"<?php endif;?>>1985</option>
                <option value="1984" <?php if($birthday_year=='1984') : ?> selected="selected"<?php endif;?>>1984</option>
                <option value="1983" <?php if($birthday_year=='1983') : ?> selected="selected"<?php endif;?>>1983</option>
                <option value="1982" <?php if($birthday_year=='1982') : ?> selected="selected"<?php endif;?>>1982</option>
                <option value="1981" <?php if($birthday_year=='1981') : ?> selected="selected"<?php endif;?>>1981</option>
                <option value="1980" <?php if($birthday_year=='1980') : ?> selected="selected"<?php endif;?>>1980</option>
                <option value="1979" <?php if($birthday_year=='1979') : ?> selected="selected"<?php endif;?>>1979</option>
                <option value="1978" <?php if($birthday_year=='1978') : ?> selected="selected"<?php endif;?>>1978</option>
                <option value="1977" <?php if($birthday_year=='1977') : ?> selected="selected"<?php endif;?>>1977</option>
                <option value="1976" <?php if($birthday_year=='1976') : ?> selected="selected"<?php endif;?>>1976</option>
                <option value="1975" <?php if($birthday_year=='1975') : ?> selected="selected"<?php endif;?>>1975</option>
                <option value="1974" <?php if($birthday_year=='1974') : ?> selected="selected"<?php endif;?>>1974</option>
                <option value="1973" <?php if($birthday_year=='1973') : ?> selected="selected"<?php endif;?>>1973</option>
                <option value="1972" <?php if($birthday_year=='1972') : ?> selected="selected"<?php endif;?>>1972</option>
                <option value="1971" <?php if($birthday_year=='1971') : ?> selected="selected"<?php endif;?>>1971</option>
                <option value="1970" <?php if($birthday_year=='1970') : ?> selected="selected"<?php endif;?>>1970</option>
                <option value="1969" <?php if($birthday_year=='1969') : ?> selected="selected"<?php endif;?>>1969</option>
                <option value="1968" <?php if($birthday_year=='1968') : ?> selected="selected"<?php endif;?>>1968</option>
                <option value="1967" <?php if($birthday_year=='1967') : ?> selected="selected"<?php endif;?>>1967</option>
                <option value="1966" <?php if($birthday_year=='1966') : ?> selected="selected"<?php endif;?>>1966</option>
                <option value="1965" <?php if($birthday_year=='1965') : ?> selected="selected"<?php endif;?>>1965</option>
                <option value="1964" <?php if($birthday_year=='1964') : ?> selected="selected"<?php endif;?>>1964</option>
                <option value="1963" <?php if($birthday_year=='1963') : ?> selected="selected"<?php endif;?>>1963</option>
                <option value="1962" <?php if($birthday_year=='1962') : ?> selected="selected"<?php endif;?>>1962</option>
                <option value="1961" <?php if($birthday_year=='1961') : ?> selected="selected"<?php endif;?>>1961</option>
                <option value="1960" <?php if($birthday_year=='1960') : ?> selected="selected"<?php endif;?>>1960</option>
                <option value="1959" <?php if($birthday_year=='1959') : ?> selected="selected"<?php endif;?>>1959</option>
                <option value="1958" <?php if($birthday_year=='1958') : ?> selected="selected"<?php endif;?>>1958</option>
                <option value="1957" <?php if($birthday_year=='1957') : ?> selected="selected"<?php endif;?>>1957</option>
                <option value="1956" <?php if($birthday_year=='1956') : ?> selected="selected"<?php endif;?>>1956</option>
                <option value="1955" <?php if($birthday_year=='1955') : ?> selected="selected"<?php endif;?>>1955</option>
                <option value="1954" <?php if($birthday_year=='1954') : ?> selected="selected"<?php endif;?>>1954</option>
                <option value="1953" <?php if($birthday_year=='1953') : ?> selected="selected"<?php endif;?>>1953</option>
                <option value="1952" <?php if($birthday_year=='1952') : ?> selected="selected"<?php endif;?>>1952</option>
                <option value="1951" <?php if($birthday_year=='1951') : ?> selected="selected"<?php endif;?>>1951</option>
                <option value="1950" <?php if($birthday_year=='1950') : ?> selected="selected"<?php endif;?>>1950</option>
                <option value="1949" <?php if($birthday_year=='1949') : ?> selected="selected"<?php endif;?>>1949</option>
                <option value="1948" <?php if($birthday_year=='1948') : ?> selected="selected"<?php endif;?>>1948</option>
                <option value="1947" <?php if($birthday_year=='1947') : ?> selected="selected"<?php endif;?>>1947</option>
                <option value="1946" <?php if($birthday_year=='1946') : ?> selected="selected"<?php endif;?>>1946</option>
                <option value="1945" <?php if($birthday_year=='1945') : ?> selected="selected"<?php endif;?>>1945</option>
                <option value="1944" <?php if($birthday_year=='1944') : ?> selected="selected"<?php endif;?>>1944</option>
                <option value="1943" <?php if($birthday_year=='1943') : ?> selected="selected"<?php endif;?>>1943</option>
                <option value="1942" <?php if($birthday_year=='1942') : ?> selected="selected"<?php endif;?>>1942</option>
                <option value="1941" <?php if($birthday_year=='1941') : ?> selected="selected"<?php endif;?>>1941</option>
                <option value="1940" <?php if($birthday_year=='1940') : ?> selected="selected"<?php endif;?>>1940</option>
                <option value="1939" <?php if($birthday_year=='1939') : ?> selected="selected"<?php endif;?>>1939</option>
                <option value="1938" <?php if($birthday_year=='1938') : ?> selected="selected"<?php endif;?>>1938</option>
                <option value="1937" <?php if($birthday_year=='1937') : ?> selected="selected"<?php endif;?>>1937</option>
                <option value="1936" <?php if($birthday_year=='1936') : ?> selected="selected"<?php endif;?>>1936</option>
                <option value="1935" <?php if($birthday_year=='1935') : ?> selected="selected"<?php endif;?>>1935</option>
                <option value="1934" <?php if($birthday_year=='1934') : ?> selected="selected"<?php endif;?>>1934</option>
                <option value="1933" <?php if($birthday_year=='1933') : ?> selected="selected"<?php endif;?>>1933</option>
                <option value="1932" <?php if($birthday_year=='1932') : ?> selected="selected"<?php endif;?>>1932</option>
                <option value="1931" <?php if($birthday_year=='1931') : ?> selected="selected"<?php endif;?>>1931</option>
                <option value="1930" <?php if($birthday_year=='1930') : ?> selected="selected"<?php endif;?>>1930</option>
                <option value="1929" <?php if($birthday_year=='1929') : ?> selected="selected"<?php endif;?>>1929</option>
                <option value="1928" <?php if($birthday_year=='1928') : ?> selected="selected"<?php endif;?>>1928</option>
                <option value="1927" <?php if($birthday_year=='1927') : ?> selected="selected"<?php endif;?>>1927</option>
                <option value="1926" <?php if($birthday_year=='1926') : ?> selected="selected"<?php endif;?>>1926</option>
                <option value="1925" <?php if($birthday_year=='1925') : ?> selected="selected"<?php endif;?>>1925</option>
                <option value="1924" <?php if($birthday_year=='1924') : ?> selected="selected"<?php endif;?>>1924</option>
                <option value="1923" <?php if($birthday_year=='1923') : ?> selected="selected"<?php endif;?>>1923</option>
                <option value="1922" <?php if($birthday_year=='1922') : ?> selected="selected"<?php endif;?>>1922</option>
                <option value="1921" <?php if($birthday_year=='1921') : ?> selected="selected"<?php endif;?>>1921</option>
                <option value="1920" <?php if($birthday_year=='1920') : ?> selected="selected"<?php endif;?>>1920</option>
                <option value="1919" <?php if($birthday_year=='1919') : ?> selected="selected"<?php endif;?>>1919</option>
                <option value="1918" <?php if($birthday_year=='1918') : ?> selected="selected"<?php endif;?>>1918</option>
                <option value="1917" <?php if($birthday_year=='1917') : ?> selected="selected"<?php endif;?>>1917</option>
                <option value="1916" <?php if($birthday_year=='1916') : ?> selected="selected"<?php endif;?>>1916</option>
                <option value="1915" <?php if($birthday_year=='1915') : ?> selected="selected"<?php endif;?>>1915</option>
                <option value="1914" <?php if($birthday_year=='1914') : ?> selected="selected"<?php endif;?>>1914</option>
                <option value="1913" <?php if($birthday_year=='1913') : ?> selected="selected"<?php endif;?>>1913</option>
                <option value="1912" <?php if($birthday_year=='1912') : ?> selected="selected"<?php endif;?>>1912</option>
                <option value="1911" <?php if($birthday_year=='1911') : ?> selected="selected"<?php endif;?>>1911</option>
                <option value="1910" <?php if($birthday_year=='1910') : ?> selected="selected"<?php endif;?>>1910</option>
                <option value="1909" <?php if($birthday_year=='1909') : ?> selected="selected"<?php endif;?>>1909</option>
                <option value="1908" <?php if($birthday_year=='1908') : ?> selected="selected"<?php endif;?>>1908</option>
                <option value="1907" <?php if($birthday_year=='1907') : ?> selected="selected"<?php endif;?>>1907</option>
                <option value="1906" <?php if($birthday_year=='1906') : ?> selected="selected"<?php endif;?>>1906</option>
                <option value="1905" <?php if($birthday_year=='1905') : ?> selected="selected"<?php endif;?>>1905</option>
                <option value="1904" <?php if($birthday_year=='1904') : ?> selected="selected"<?php endif;?>>1904</option>
                <option value="1903" <?php if($birthday_year=='1903') : ?> selected="selected"<?php endif;?>>1903</option>
                <option value="1902" <?php if($birthday_year=='1902') : ?> selected="selected"<?php endif;?>>1902</option>
                <option value="1901" <?php if($birthday_year=='1901') : ?> selected="selected"<?php endif;?>>1901</option>
                <option value="1900" <?php if($birthday_year=='1900') : ?> selected="selected"<?php endif;?>>1900</option>
            </select><br>
            <?php if(isset($cv_error)){echo $cv_error;}?>
            <label for="cv">cv :</label>
            <input type="file" name="cv" id="cv"><br>
            <embed src="files/<?php echo $cv;?>"><br>
            <button type="submit" name="submit">Save changes</button>
        </form>
    </div>
    
</body>
</html>
<?php
        }
    }
    else{
        include('index.php');
        exit();
    }
?>