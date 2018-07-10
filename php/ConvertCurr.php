
<?php
    class Exchange{
        public function change(){ // set API Endpoint and access key (and any options of your choice)
                $endpoint = 'live';
                $access_key = 'aee3fc7cc75dbfb3e5751e0411f92699';

                // Initialize CURL:
                $ch = curl_init('http://apilayer.net/api/'.$endpoint.'?access_key='.$access_key.'');
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                // Store the data:
                $json = curl_exec($ch);
                curl_close($ch);

                $from = $_POST['First-dropbox'];
                $to = $_POST['Second-dropbox'];
                // Decode JSON response:
                $exchangeRates = json_decode($json, true);

                // Access the exchange rate values, e.g. GBP:
                return $exchangeRates['quotes']["$from$to"];
                //echo $exchangeRates['quotes']['USDEGP'];
        //        return $exchangeRates['quotes']["$from$to"];
        }
    }
?>
        