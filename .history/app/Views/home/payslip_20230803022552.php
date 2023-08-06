<?php
if($result && $account_records) {
    if($result['rank'] == 'REC') { ?>
        <div id="containerSearchIllustration" class="flex flex-col space-y-2 items-center">
            <svg width="280" height="280" viewBox="0 0 280 280" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M52.6631 127.029C52.6631 127.029 91.434 125.477 99.8125 61.7456C107.253 5.14629 172.631 30.9083 191.529 53.4701C216.01 82.6971 202.96 132.974 234.629 139.325C266.299 145.676 245.618 216.292 197.546 209.533C137.746 201.125 152.214 236.069 134.262 250.859C121.379 261.475 68.5515 251.256 66.7908 212.723C65.3092 180.297 51.6315 180.4 41.9366 176.723C27.9544 171.421 19.1441 133.017 52.6631 127.029Z" fill="#DEE9FF"/>
                <path d="M184.462 197.807L146.371 160.168L138.828 167.801L176.92 205.44L184.462 197.807Z" fill="#699CFF"/>
                <path d="M199.013 207.92L169.378 178.637C169.213 178.474 168.947 178.476 168.784 178.641L157.568 189.992C157.405 190.157 157.406 190.423 157.571 190.586L187.206 219.869C187.371 220.032 187.637 220.031 187.8 219.866L199.017 208.514C199.18 208.349 199.178 208.083 199.013 207.92Z" fill="#0E84E5"/>
                <path d="M112.611 179.097C138.816 179.097 160.06 157.853 160.06 131.648C160.06 105.442 138.816 84.1982 112.611 84.1982C86.4051 84.1982 65.1613 105.442 65.1613 131.648C65.1613 157.853 86.4051 179.097 112.611 179.097Z" fill="#0E84E5"/>
                <path d="M112.611 171.355C134.54 171.355 152.318 153.578 152.318 131.648C152.318 109.718 134.54 91.9407 112.611 91.9407C90.6811 91.9407 72.9036 109.718 72.9036 131.648C72.9036 153.578 90.6811 171.355 112.611 171.355Z" fill="#D4E5FF"/>
                <path d="M192.83 88.7531C181.7 85.1454 169.672 91.247 166.049 102.423C162.442 113.553 168.543 125.581 179.719 129.203C190.895 132.825 202.892 126.664 206.5 115.533C210.108 104.403 203.96 92.3606 192.83 88.7531ZM189.471 99.1145C190.717 99.5183 191.815 100.283 192.626 101.312C193.436 102.34 193.923 103.587 194.024 104.892C194.126 106.198 193.837 107.504 193.195 108.646C192.552 109.787 191.586 110.712 190.417 111.303C189.249 111.894 187.931 112.125 186.631 111.966C185.331 111.807 184.107 111.266 183.115 110.411C182.124 109.556 181.408 108.425 181.06 107.163C180.711 105.9 180.746 104.563 181.158 103.32C182.273 99.8813 186.032 97.9999 189.471 99.1145ZM181.068 125.041C177.37 123.848 174.202 121.407 172.106 118.136C176.029 115.907 180.13 115.286 183.84 116.489C187.55 117.692 190.567 120.569 192.377 124.706C188.76 126.126 184.762 126.244 181.068 125.041Z" fill="#418DF9"/>
                <path d="M100.191 190.176C98.258 191.163 96.6608 192.701 95.6016 194.595C94.5424 196.49 94.0688 198.656 94.2406 200.82C94.4125 202.983 95.2221 205.047 96.5671 206.751C97.9121 208.455 99.7321 209.721 101.797 210.39C103.862 211.06 106.078 211.101 108.167 210.511C110.256 209.92 112.122 208.723 113.531 207.072C114.939 205.42 115.826 203.388 116.08 201.233C116.333 199.077 115.942 196.895 114.955 194.961C113.629 192.371 111.331 190.413 108.563 189.516C105.795 188.618 102.784 188.856 100.191 190.176ZM102.747 195.184C103.349 194.876 104.029 194.755 104.701 194.834C105.372 194.914 106.005 195.191 106.518 195.63C107.032 196.07 107.403 196.652 107.585 197.303C107.768 197.954 107.752 198.645 107.541 199.287C107.331 199.93 106.934 200.495 106.401 200.911C105.869 201.328 105.225 201.577 104.55 201.626C103.876 201.676 103.202 201.525 102.614 201.191C102.027 200.857 101.551 200.356 101.248 199.752C100.847 198.946 100.779 198.015 101.06 197.16C101.34 196.305 101.947 195.594 102.747 195.183V195.184ZM109.143 207.714C107.358 208.628 105.311 208.893 103.352 208.464C103.97 206.219 105.24 204.496 107.034 203.581C108.827 202.665 110.978 202.615 113.149 203.464C112.347 205.302 110.931 206.804 109.143 207.713V207.714Z" fill="#418DF9"/>
            </svg>
            <p id="responseText" class="text-gray-400 text-xs font-sans pb-8 mb-4 font-semibold">Apologies, but creation of payslip for <u>that staff</u> is currently not permitted</p>
        </div>
    <?php 
    } else {
    ?>
    <div class="flex flex-col w-full p-4">
        <p class="text-center text-2xl text-gray-700">Independent National Electoral Commission</p>
        <p class="text-center text-sm text-gray-600">Opposite Pyramid Hotel Calabar, Cross River State</p>
        <table class="table-auto w-full border border-collapse border-slate-500">
            <tr>
                <td class="font-semibold text-sm">Staff File No.:</td>
                <td class="font-italic">INEC/CRS/<?=$result['file_no']?></td>
                <td class="font-semibold">Name:</td>
                <td class="font-italic"><?=$result['staff_name']?></td>
                <td class="font-semibold">Pay Point:</td>
                <td class="font-italic font-">
                    <span><?=$account_records->bank_name?></span>&nbsp;(<?=$account_records->bank_code?>)
                    <span> - <?=$account_records->acct_num?></span>
                </td>
            </tr>
        </table>
    </div>
    <?php }
}else{ ?>

    <div id="containerSearchIllustration" class="flex flex-col space-y-2 items-center">
        <svg width="200" height="203" viewBox="0 0 200 203" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M3.5004 171.398C11.1164 189.983 23.5344 193.851 32.2652 189.983C49.1503 182.501 93.0119 174.143 138.059 193.791C197.722 219.814 210.416 180.552 191.375 140.837C172.334 101.123 165.88 60.9603 187.831 38.8331C209.782 16.706 181.057 -17.9088 130.044 18.1228C97.0775 41.4077 72.884 36.2229 59.8921 29.6403C47.6477 23.4365 34.0305 16.9507 21.2724 22.0148C5.79192 28.1598 -0.307876 41.4825 23.245 71.2455C56.6214 113.422 -13.5719 129.74 3.5004 171.398Z" fill="#DEE9FF"/>
            <path d="M34.5103 80.8643H153.038V172.02C153.038 172.205 152.965 172.383 152.833 172.514C152.702 172.646 152.524 172.72 152.338 172.72H35.2103C35.0246 172.72 34.8465 172.646 34.7153 172.514C34.584 172.383 34.5103 172.205 34.5103 172.02V80.8643Z" fill="#A2BDFF"/>
            <path d="M123.304 45.1428H68.1905L34.5103 80.8642H153.038L123.304 45.1428Z" fill="#418DF9"/>
            <path d="M45.7369 30.8541L68.1904 45.1428L34.5102 80.8642L8.99475 61.4725L45.7369 30.8541Z" fill="#699CFF"/>
            <path d="M145.757 30.8541L123.303 45.1428L153.038 80.8642L182.499 61.4725L145.757 30.8541Z" fill="#699CFF"/>
            <path d="M82.67 31.5847C83.3036 31.2842 83.7965 30.7505 84.0459 30.0951C84.2952 29.4397 84.2815 28.7133 84.0078 28.0677L73.9069 4.24979C73.7639 3.91242 73.554 3.60747 73.2901 3.35326C73.0262 3.09906 72.7135 2.90086 72.371 2.77058C72.0285 2.6403 71.6632 2.58063 71.297 2.59515C70.9309 2.60968 70.5714 2.69811 70.2403 2.85511L68.2943 3.77785C67.9632 3.93485 67.6673 4.15718 67.4243 4.43148C67.1813 4.70578 66.9963 5.02639 66.8804 5.37402C66.7645 5.72165 66.7201 6.08912 66.7498 6.45436C66.7796 6.81959 66.8829 7.17504 67.0535 7.49933L79.1002 30.3944C79.4268 31.015 79.9805 31.4853 80.6458 31.7072C81.3111 31.929 82.0363 31.8851 82.67 31.5847Z" fill="#418DF9"/>
            <path d="M95.3337 29.2757C95.7923 29.243 96.2205 29.0344 96.5289 28.6934C96.8373 28.3525 97.002 27.9055 96.9886 27.446L96.4897 10.4897C96.4826 10.2496 96.427 10.0133 96.3263 9.79513C96.2256 9.57697 96.0818 9.38143 95.9036 9.22027C95.7254 9.0591 95.5164 8.93563 95.2892 8.85729C95.0621 8.77894 94.8214 8.74734 94.5818 8.76437L93.173 8.86475C92.9334 8.88181 92.6997 8.94713 92.486 9.05678C92.2723 9.16644 92.0829 9.31817 91.9293 9.50285C91.7758 9.68754 91.6611 9.90137 91.5922 10.1315C91.5234 10.3616 91.5018 10.6033 91.5287 10.842L93.4364 27.698C93.488 28.155 93.7143 28.5743 94.0679 28.8683C94.4214 29.1623 94.875 29.3083 95.3337 29.2757Z" fill="#418DF9"/>
            <path d="M105.11 35.5438C106.372 36.2731 108.142 35.6039 109.124 34.0265L126.563 6.01909C127.605 4.34595 127.358 2.30671 126.021 1.53321L124.156 0.455212C122.818 -0.318428 120.927 0.48489 119.997 2.22243L104.423 31.3077C103.546 32.9458 103.849 34.8144 105.11 35.5438Z" fill="#418DF9"/>
            </svg>
            <p id="responseText" class="text-gray-400 text-xs font-sans pb-8 mb-4 font-semibold">Either the staff does'nt exist or no account data was found.</p>
        </div>

<?php } ?>