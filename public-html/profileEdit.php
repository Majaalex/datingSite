<?php
require_once '../resources/config.php';
require_once '../resources/templates/header.php';
include('profileConnect.php');
?>

<?php
//Connect to database and make a query of the persona and set the values in the input fields
$query = db::instance()->get("SELECT * FROM users WHERE username = ?",array($_SESSION['id']));
$currency = $query[0]["currency"];
$gender = $query[0]["gender"];
$pref = $query[0]["preference"];
?>
    <!DOCTYPE html>
    <head>
        <meta charset="utf-8">
    </head>

    <div class="centered">
        <!--A form for editing-->
        <!--All the input fields follow the same principle as the first one-->
        <form method="post" action="profileEdit.php" id="register_form">
            <h1>Edit</h1>
            <!--First Name field-->
            <!--Creates a div if there is an error in the users first name-->
            <div <?php if (isset($firstName_error)): ?> class="form_error" id="test" <?php endif ?> >
                <input type="text" name="firstname" placeholder="First Name" value="<?php echo $query[0]["firstname"]; ?>" required>
                <?php if (isset($firstName_error)): ?>
                    <span><?php echo $firstName_error; ?></span>
                <?php endif ?>
            </div>

            <!--Last Name field-->
            <div <?php if (isset($lastName_error)): ?> class="form_error" id="test" <?php endif ?> >
                <input type="text" name="lastname" placeholder="Last Name" value="<?php echo $query[0]["lastname"]; ?>" required>
                <?php if (isset($lastName_error)): ?>
                    <span><?php echo $lastName_error; ?></span>
                <?php endif ?>
            </div>

            <!--Email field-->
            <div <?php if (isset($emailInUse_error)): ?> class="form_error" <?php endif ?> >
                <input type="email" name="email" placeholder="Email" value="<?php echo $query[0]["email"]; ?>" required>
                <?php if (isset($emailInUse_error)): ?>
                    <span><?php echo $emailInUse_error; ?></span>
                <?php endif ?>
                <div <?php if (isset($emailInvalid_error)): ?> class="form_error" <?php endif ?> >
                    <?php if (isset($emailInvalid_error)): ?>
                        <span><?php echo $emailInvalid_error; ?></span>
                    <?php endif ?>
                </div>
            </div>

            <!--Postal code field-->
            <div <?php if (isset($postal_error)): ?> class="form_error" <?php endif ?> >
                <input type="number" max="99999" name="postalCode" placeholder="Postal code ex.00200" value="<?php echo $query[0]["postal"]; ?>" required>
                <?php if (isset($postal_error)): ?>
                    <span><?php echo $postal_error; ?></span>
                <?php endif ?>
                <div <?php if (isset($postalPreg_error)): ?> class="form_error" <?php endif ?> >
                    <?php if (isset($postalPreg_error)): ?>
                        <span><?php echo $postalPreg_error; ?></span>
                    <?php endif ?>
                </div>
            </div>

            <!--About me field-->
            <div <?php if (isset($about_error)): ?> class="form_error" <?php endif ?> >
                <input type="text" name="about" placeholder="About me" value="<?php echo $query[0]["about"]; ?>" required >
                <?php if (isset($about_error)): ?>
                    <span><?php echo $about_error; ?></span>
                <?php endif ?>
            </div>

            <!--Age field-->
            <div <?php if (isset($age_error)): ?> class="form_error" <?php endif ?> >
                <input type="number"  name="age" placeholder="Age" value="<?php echo $query[0]["age"]; ?>" required>
                <?php if (isset($age_error)): ?>
                    <span><?php echo $age_error; ?></span>
                <?php endif ?>
                <div <?php if (isset($ageYoung_error)): ?> class="form_error" <?php endif ?> >
                    <?php if (isset($ageYoung_error)): ?>
                        <span><?php echo $ageYoung_error; ?></span>
                    <?php endif ?>
                </div>
            </div>

            <!--Salary field-->
            <div <?php if (isset($salaryPreg_error)): ?> class="form_error" <?php endif ?> >
                <input type="number" name="salary" placeholder="Salary" value="<?php echo $query[0]["salary"]; ?>" required>
                <?php if (isset($salaryPreg_error)): ?>
                    <span><?php echo $salaryPreg_error; ?></span>
                <?php endif ?>
            </div>

            <!--Currency field-->
            <div>
                <label>Currency:
                    <select name="currency">
                        <optgroup label="Commonly used">
                            <option <?php if ($currency == 'AUD') {echo 'selected' ;} ?> value="AUD">AUD</option>
                            <option <?php if ($currency == 'BRL') {echo 'selected' ;} ?> value="BRL">BRL</option>
                            <option <?php if ($currency == 'CAD') {echo 'selected' ;} ?> value="CAD">CAD</option>
                            <option <?php if ($currency == 'CHF') {echo 'selected' ;} ?> value="CHF">CHF</option>
                            <option <?php if ($currency == 'CNY') {echo 'selected' ;} ?> value="CNY">CNY</option>
                            <option <?php if ($currency == 'EUR') {echo 'selected' ;} ?> value="EUR">EUR</option>
                            <option <?php if ($currency == 'GBP') {echo 'selected' ;} ?> value="GBP">GBP</option>
                            <option <?php if ($currency == 'HKD') {echo 'selected' ;} ?> value="HKD">HKD</option>
                            <option <?php if ($currency == 'INR') {echo 'selected' ;} ?> value="INR">INR</option>
                            <option <?php if ($currency == 'JPY') {echo 'selected' ;} ?> value="JPY">JPY</option>
                            <option <?php if ($currency == 'KRW') {echo 'selected' ;} ?> value="KRW">KRW</option>
                            <option <?php if ($currency == 'MXN') {echo 'selected' ;} ?> value="MXN">MXN</option>
                            <option <?php if ($currency == 'NOK') {echo 'selected' ;} ?> value="NOK">NOK</option>
                            <option <?php if ($currency == 'NZD') {echo 'selected' ;} ?> value="NZD">NZD</option>
                            <option <?php if ($currency == 'RUB') {echo 'selected' ;} ?> value="RUB">RUB</option>
                            <option <?php if ($currency == 'SEK') {echo 'selected' ;} ?> value="SEK">SEK</option>
                            <option <?php if ($currency == 'SGD') {echo 'selected' ;} ?> value="SGD">SGD</option>
                            <option <?php if ($currency == 'TRY') {echo 'selected' ;} ?> value="TRY">TRY</option>
                            <option <?php if ($currency == 'USD') {echo 'selected' ;} ?> value="USD">USD</option>
                            <option <?php if ($currency == 'ZAR') {echo 'selected' ;} ?> value="ZAR">ZAR</option>
                        </optgroup>
                        <optgroup label="The Rest">
                            <option <?php if ($currency == 'AED') {echo 'selected' ;} ?> value="AED">AED</option>
                            <option <?php if ($currency == 'AFN') {echo 'selected' ;} ?> value="AFN">AFN</option>
                            <option <?php if ($currency == 'ALL') {echo 'selected' ;} ?> value="ALL">ALL</option>
                            <option <?php if ($currency == 'AMD') {echo 'selected' ;} ?> value="AMD">AMD</option>
                            <option <?php if ($currency == 'ANG') {echo 'selected' ;} ?> value="ANG">ANG</option>
                            <option <?php if ($currency == 'AOA') {echo 'selected' ;} ?> value="AOA">AOA</option>
                            <option <?php if ($currency == 'ARS') {echo 'selected' ;} ?> value="ARS">ARS</option>
                            <option <?php if ($currency == 'AWG') {echo 'selected' ;} ?> value="AWG">AWG</option>
                            <option <?php if ($currency == 'AZN') {echo 'selected' ;} ?> value="AZN">AZN</option>
                            <option <?php if ($currency == 'BAM') {echo 'selected' ;} ?> value="BAM">BAM</option>
                            <option <?php if ($currency == 'BBD') {echo 'selected' ;} ?> value="BBD">BBD</option>
                            <option <?php if ($currency == 'BDT') {echo 'selected' ;} ?> value="BDT">BDT</option>
                            <option <?php if ($currency == 'BGN') {echo 'selected' ;} ?> value="BGN">BGN</option>
                            <option <?php if ($currency == 'BHD') {echo 'selected' ;} ?> value="BHD">BHD</option>
                            <option <?php if ($currency == 'BIF') {echo 'selected' ;} ?> value="BIF">BIF</option>
                            <option <?php if ($currency == 'BMD') {echo 'selected' ;} ?> value="BMD">BMD</option>
                            <option <?php if ($currency == 'BND') {echo 'selected' ;} ?> value="BND">BND</option>
                            <option <?php if ($currency == 'BOB') {echo 'selected' ;} ?> value="BOB">BOB</option>
                            <option <?php if ($currency == 'BSD') {echo 'selected' ;} ?> value="BSD">BSD</option>
                            <option <?php if ($currency == 'BTC') {echo 'selected' ;} ?> value="BTC">BTC</option>
                            <option <?php if ($currency == 'BTN') {echo 'selected' ;} ?> value="BTN">BTN</option>
                            <option <?php if ($currency == 'BWP') {echo 'selected' ;} ?> value="BWP">BWP</option>
                            <option <?php if ($currency == 'BYN') {echo 'selected' ;} ?> value="BYN">BYN</option>
                            <option <?php if ($currency == 'BZD') {echo 'selected' ;} ?> value="BZD">BZD</option>
                            <option <?php if ($currency == 'CDF') {echo 'selected' ;} ?> value="CDF">CDF</option>
                            <option <?php if ($currency == 'CLF') {echo 'selected' ;} ?> value="CLF">CLF</option>
                            <option <?php if ($currency == 'CLP') {echo 'selected' ;} ?> value="CLP">CLP</option>
                            <option <?php if ($currency == 'CNH') {echo 'selected' ;} ?> value="CNH">CNH</option>
                            <option <?php if ($currency == 'COP') {echo 'selected' ;} ?> value="COP">COP</option>
                            <option <?php if ($currency == 'CRC') {echo 'selected' ;} ?> value="CRC">CRC</option>
                            <option <?php if ($currency == 'CUC') {echo 'selected' ;} ?> value="CUC">CUC</option>
                            <option <?php if ($currency == 'CUP') {echo 'selected' ;} ?> value="CUP">CUP</option>
                            <option <?php if ($currency == 'CVE') {echo 'selected' ;} ?> value="CVE">CVE</option>
                            <option <?php if ($currency == 'CZK') {echo 'selected' ;} ?> value="CZK">CZK</option>
                            <option <?php if ($currency == 'DJF') {echo 'selected' ;} ?> value="DJF">DJF</option>
                            <option <?php if ($currency == 'DKK') {echo 'selected' ;} ?> value="DKK">DKK</option>
                            <option <?php if ($currency == 'DOP') {echo 'selected' ;} ?> value="DOP">DOP</option>
                            <option <?php if ($currency == 'DZD') {echo 'selected' ;} ?> value="DZD">DZD</option>
                            <option <?php if ($currency == 'EGP') {echo 'selected' ;} ?> value="EGP">EGP</option>
                            <option <?php if ($currency == 'ERN') {echo 'selected' ;} ?> value="ERN">ERN</option>
                            <option <?php if ($currency == 'ETB') {echo 'selected' ;} ?> value="ETB">ETB</option>
                            <option <?php if ($currency == 'FJD') {echo 'selected' ;} ?> value="FJD">FJD</option>
                            <option <?php if ($currency == 'FKP') {echo 'selected' ;} ?> value="FKP">FKP</option>
                            <option <?php if ($currency == 'GEL') {echo 'selected' ;} ?> value="GEL">GEL</option>
                            <option <?php if ($currency == 'GGP') {echo 'selected' ;} ?> value="GGP">GGP</option>
                            <option <?php if ($currency == 'GHS') {echo 'selected' ;} ?> value="GHS">GHS</option>
                            <option <?php if ($currency == 'GIP') {echo 'selected' ;} ?> value="GIP">GIP</option>
                            <option <?php if ($currency == 'GMD') {echo 'selected' ;} ?> value="GMD">GMD</option>
                            <option <?php if ($currency == 'GNF') {echo 'selected' ;} ?> value="GNF">GNF</option>
                            <option <?php if ($currency == 'GTQ') {echo 'selected' ;} ?> value="GTQ">GTQ</option>
                            <option <?php if ($currency == 'GYD') {echo 'selected' ;} ?> value="GYD">GYD</option>
                            <option <?php if ($currency == 'HNL') {echo 'selected' ;} ?> value="HNL">HNL</option>
                            <option <?php if ($currency == 'HRK') {echo 'selected' ;} ?> value="HRK">HRK</option>
                            <option <?php if ($currency == 'HTG') {echo 'selected' ;} ?> value="HTG">HTG</option>
                            <option <?php if ($currency == 'HUF') {echo 'selected' ;} ?> value="HUF">HUF</option>
                            <option <?php if ($currency == 'IDR') {echo 'selected' ;} ?> value="IDR">IDR</option>
                            <option <?php if ($currency == 'ILS') {echo 'selected' ;} ?> value="ILS">ILS</option>
                            <option <?php if ($currency == 'IMP') {echo 'selected' ;} ?> value="IMP">IMP</option>
                            <option <?php if ($currency == 'IQD') {echo 'selected' ;} ?> value="IQD">IQD</option>
                            <option <?php if ($currency == 'IRR') {echo 'selected' ;} ?> value="IRR">IRR</option>
                            <option <?php if ($currency == 'ISK') {echo 'selected' ;} ?> value="ISK">ISK</option>
                            <option <?php if ($currency == 'JEP') {echo 'selected' ;} ?> value="JEP">JEP</option>
                            <option <?php if ($currency == 'JMD') {echo 'selected' ;} ?> value="JMD">JMD</option>
                            <option <?php if ($currency == 'JOD') {echo 'selected' ;} ?> value="JOD">JOD</option>
                            <option <?php if ($currency == 'KES') {echo 'selected' ;} ?> value="KES">KES</option>
                            <option <?php if ($currency == 'KGS') {echo 'selected' ;} ?> value="KGS">KGS</option>
                            <option <?php if ($currency == 'KHR') {echo 'selected' ;} ?> value="KHR">KHR</option>
                            <option <?php if ($currency == 'KMF') {echo 'selected' ;} ?> value="KMF">KMF</option>
                            <option <?php if ($currency == 'KPW') {echo 'selected' ;} ?> value="KPW">KPW</option>
                            <option <?php if ($currency == 'KWD') {echo 'selected' ;} ?> value="KWD">KWD</option>
                            <option <?php if ($currency == 'KYD') {echo 'selected' ;} ?> value="KYD">KYD</option>
                            <option <?php if ($currency == 'KZT') {echo 'selected' ;} ?> value="KZT">KZT</option>
                            <option <?php if ($currency == 'LAK') {echo 'selected' ;} ?> value="LAK">LAK</option>
                            <option <?php if ($currency == 'LBP') {echo 'selected' ;} ?> value="LBP">LBP</option>
                            <option <?php if ($currency == 'LKR') {echo 'selected' ;} ?> value="LKR">LKR</option>
                            <option <?php if ($currency == 'LRD') {echo 'selected' ;} ?> value="LRD">LRD</option>
                            <option <?php if ($currency == 'LSL') {echo 'selected' ;} ?> value="LSL">LSL</option>
                            <option <?php if ($currency == 'LYD') {echo 'selected' ;} ?> value="LYD">LYD</option>
                            <option <?php if ($currency == 'MAD') {echo 'selected' ;} ?> value="MAD">MAD</option>
                            <option <?php if ($currency == 'MDL') {echo 'selected' ;} ?> value="MDL">MDL</option>
                            <option <?php if ($currency == 'MGA') {echo 'selected' ;} ?> value="MGA">MGA</option>
                            <option <?php if ($currency == 'MKD') {echo 'selected' ;} ?> value="MKD">MKD</option>
                            <option <?php if ($currency == 'MMK') {echo 'selected' ;} ?> value="MMK">MMK</option>
                            <option <?php if ($currency == 'MNT') {echo 'selected' ;} ?> value="MNT">MNT</option>
                            <option <?php if ($currency == 'MOP') {echo 'selected' ;} ?> value="MOP">MOP</option>
                            <option <?php if ($currency == 'MRO') {echo 'selected' ;} ?> value="MRO">MRO</option>
                            <option <?php if ($currency == 'MRU') {echo 'selected' ;} ?> value="MRU">MRU</option>
                            <option <?php if ($currency == 'MUR') {echo 'selected' ;} ?> value="MUR">MUR</option>
                            <option <?php if ($currency == 'MVR') {echo 'selected' ;} ?> value="MVR">MVR</option>
                            <option <?php if ($currency == 'MWK') {echo 'selected' ;} ?> value="MWK">MWK</option>
                            <option <?php if ($currency == 'MYR') {echo 'selected' ;} ?> value="MYR">MYR</option>
                            <option <?php if ($currency == 'MZN') {echo 'selected' ;} ?> value="MZN">MZN</option>
                            <option <?php if ($currency == 'NAD') {echo 'selected' ;} ?> value="NAD">NAD</option>
                            <option <?php if ($currency == 'NGN') {echo 'selected' ;} ?> value="NGN">NGN</option>
                            <option <?php if ($currency == 'NIO') {echo 'selected' ;} ?> value="NIO">NIO</option>
                            <option <?php if ($currency == 'NPR') {echo 'selected' ;} ?> value="NPR">NPR</option>
                            <option <?php if ($currency == 'OMR') {echo 'selected' ;} ?> value="OMR">OMR</option>
                            <option <?php if ($currency == 'PAB') {echo 'selected' ;} ?> value="PAB">PAB</option>
                            <option <?php if ($currency == 'PEN') {echo 'selected' ;} ?> value="PEN">PEN</option>
                            <option <?php if ($currency == 'PGK') {echo 'selected' ;} ?> value="PGK">PGK</option>
                            <option <?php if ($currency == 'PHP') {echo 'selected' ;} ?> value="PHP">PHP</option>
                            <option <?php if ($currency == 'PKR') {echo 'selected' ;} ?> value="PKR">PKR</option>
                            <option <?php if ($currency == 'PLN') {echo 'selected' ;} ?> value="PLN">PLN</option>
                            <option <?php if ($currency == 'PYG') {echo 'selected' ;} ?> value="PYG">PYG</option>
                            <option <?php if ($currency == 'QAR') {echo 'selected' ;} ?> value="QAR">QAR</option>
                            <option <?php if ($currency == 'RON') {echo 'selected' ;} ?> value="RON">RON</option>
                            <option <?php if ($currency == 'RSD') {echo 'selected' ;} ?> value="RSD">RSD</option>
                            <option <?php if ($currency == 'RWF') {echo 'selected' ;} ?> value="RWF">RWF</option>
                            <option <?php if ($currency == 'SAR') {echo 'selected' ;} ?> value="SAR">SAR</option>
                            <option <?php if ($currency == 'SBD') {echo 'selected' ;} ?> value="SBD">SBD</option>
                            <option <?php if ($currency == 'SCR') {echo 'selected' ;} ?> value="SCR">SCR</option>
                            <option <?php if ($currency == 'SDG') {echo 'selected' ;} ?> value="SDG">SDG</option>
                            <option <?php if ($currency == 'SHP') {echo 'selected' ;} ?> value="SHP">SHP</option>
                            <option <?php if ($currency == 'SLL') {echo 'selected' ;} ?> value="SLL">SLL</option>
                            <option <?php if ($currency == 'SOS') {echo 'selected' ;} ?> value="SOS">SOS</option>
                            <option <?php if ($currency == 'SRD') {echo 'selected' ;} ?> value="SRD">SRD</option>
                            <option <?php if ($currency == 'SSP') {echo 'selected' ;} ?> value="SSP">SSP</option>
                            <option <?php if ($currency == 'STD') {echo 'selected' ;} ?> value="STD">STD</option>
                            <option <?php if ($currency == 'STN') {echo 'selected' ;} ?> value="STN">STN</option>
                            <option <?php if ($currency == 'SVC') {echo 'selected' ;} ?> value="SVC">SVC</option>
                            <option <?php if ($currency == 'SYP') {echo 'selected' ;} ?> value="SYP">SYP</option>
                            <option <?php if ($currency == 'SZL') {echo 'selected' ;} ?> value="SZL">SZL</option>
                            <option <?php if ($currency == 'THB') {echo 'selected' ;} ?> value="THB">THB</option>
                            <option <?php if ($currency == 'TJS') {echo 'selected' ;} ?> value="TJS">TJS</option>
                            <option <?php if ($currency == 'TMT') {echo 'selected' ;} ?> value="TMT">TMT</option>
                            <option <?php if ($currency == 'TND') {echo 'selected' ;} ?> value="TND">TND</option>
                            <option <?php if ($currency == 'TOP') {echo 'selected' ;} ?> value="TOP">TOP</option>
                            <option <?php if ($currency == 'TTD') {echo 'selected' ;} ?> value="TTD">TTD</option>
                            <option <?php if ($currency == 'TWD') {echo 'selected' ;} ?> value="TWD">TWD</option>
                            <option <?php if ($currency == 'TZS') {echo 'selected' ;} ?> value="TZS">TZS</option>
                            <option <?php if ($currency == 'UAH') {echo 'selected' ;} ?> value="UAH">UAH</option>
                            <option <?php if ($currency == 'UGX') {echo 'selected' ;} ?> value="UGX">UGX</option>
                            <option <?php if ($currency == 'UYU') {echo 'selected' ;} ?> value="UYU">UYU</option>
                            <option <?php if ($currency == 'UZS') {echo 'selected' ;} ?> value="UZS">UZS</option>
                            <option <?php if ($currency == 'VEF') {echo 'selected' ;} ?> value="VEF">VEF</option>
                            <option <?php if ($currency == 'VND') {echo 'selected' ;} ?> value="VND">VND</option>
                            <option <?php if ($currency == 'VUV') {echo 'selected' ;} ?> value="VUV">VUV</option>
                            <option <?php if ($currency == 'WST') {echo 'selected' ;} ?> value="WST">WST</option>
                            <option <?php if ($currency == 'XAF') {echo 'selected' ;} ?> value="XAF">XAF</option>
                            <option <?php if ($currency == 'XAG') {echo 'selected' ;} ?> value="XAG">XAG</option>
                            <option <?php if ($currency == 'XAU') {echo 'selected' ;} ?> value="XAU">XAU</option>
                            <option <?php if ($currency == 'XCD') {echo 'selected' ;} ?> value="XCD">XCD</option>
                            <option <?php if ($currency == 'XDR') {echo 'selected' ;} ?> value="XDR">XDR</option>
                            <option <?php if ($currency == 'XOF') {echo 'selected' ;} ?> value="XOF">XOF</option>
                            <option <?php if ($currency == 'XPD') {echo 'selected' ;} ?> value="XPD">XPD</option>
                            <option <?php if ($currency == 'XPF') {echo 'selected' ;} ?> value="XPF">XPF</option>
                            <option <?php if ($currency == 'XPT') {echo 'selected' ;} ?> value="XPT">XPT</option>
                            <option <?php if ($currency == 'YER') {echo 'selected' ;} ?> value="YER">YER</option>
                            <option <?php if ($currency == 'ZMW') {echo 'selected' ;} ?> value="ZMW">ZMW</option>
                            <option <?php if ($currency == 'ZWL') {echo 'selected' ;} ?> value="ZWL">ZWL</option>
                        </optgroup>
                    </select></label>
            </div>

            <!--Gender field-->
            <div>
                <label>Gender:
                    <select name="gender">
                        <option <?php if ($gender == "male") {echo 'selected';} ?> value="male">Male</option>
                        <option <?php if ($gender == "female") {echo 'selected';} ?> value="female">Female</option>
                        <option <?php if ($gender == "other") {echo 'selected';} ?> value="other">Other</option>
                    </select></label>
            </div>

            <!--Preference field-->
            <div>
            Preference:
            <input type="checkbox" name="genderM" value="1" <?php if ($pref == 1 ||$pref == 3 || $pref == 5 ||$pref == 7) {echo 'checked';} ?>/> Male
            <input type="checkbox" name="genderF" value="2" <?php if ($pref == 2 ||$pref == 3 || $pref == 6 ||$pref == 7) {echo 'checked';} ?>/> Female
            <input type="checkbox" name="genderO" value="4" <?php if ($pref == 4 ||$pref == 5 || $pref == 6 ||$pref == 7) {echo 'checked';} ?>/> Other
            </div>

            <!--Submit button-->
            <div>
                <input type="submit" value="Save" name="save"/>
            </div>
        </form>
    </div>

<?php
require_once '../resources/templates/footer.php';
?>