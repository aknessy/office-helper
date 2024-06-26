<?php
/**
 * I am deciding to integrate a qrcode to the payslip to verify the authenticity
 */
declare(strict_types=1);

use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;

require_once(ROOTPATH. 'vendor/autoload.php');

$options = new QROptions(
  [
    'eccLevel' => QRCode::ECC_L,
    'outputType' => QRCode::OUTPUT_MARKUP_SVG,
    'version' => 5,
  ]
);

$qrcode = (new QRCode($options))->render(base_url('staff/verify/' . strtolower(str_replace('.', '_', $result->file_no))));

$tax = $cps = $nhf = $welfare = $co_op = $co_op_dues = $tot_ded = 0;
?>

<div id="scrollTo" class="w-full lg:w-2/3 md:w-1/2 mx-auto min-h-96 justify-center rounded-lg pt-6">
    <div class="hero bg-base-200 flex flex-col items-center justify-center py-5 px-2 rounded-lg mb-5">
        <div class="w-full flex flex-row items-center justify-between p-2">
            <div class="flex w-full gap-x-3 gap-y-3">
                <div class="flex w-full lg:w-2/3 md:w-2/3 gap-x-3">
                    <div class="py-2 w-full">
                        <input id="searchQuery" class="input input-bordered input-info w-full max-w-xs" type="text" placeholder="Staff name/file no. (e.g P.123)">
                    </div>
                    <div class="relative flex text-left py-2 w-full">
                        <input id="paySlipDate" class="datepicker-widget-ym input input-bordered input-info w-full max-w-xs" type="text" placeholder="Year & Month" />
                    </div>
                </div> 
                <div class="w-full lg:w-1/3 md:w-1/2 flex items-center">
                    <button id="submitQuery" class="w-full flex flex-row gap-x-3 bg-blue-950 text-white rounded-md p-2 items-center pointer-events-none">
                        <i data-feather="search" class="font-semibold font-sans text-xs h-5 w-5"></i>
                        <span class="text-lg font-semibold font-sans">Generate Pay Slip
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div id="containerSearchIllustration" class="flex-col h-full w-full space-y-2 items-center justify-center">
        <?php
        if($result->rank == 'REC') { ?>
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
        } elseif(NULL !== $result->id) {
            ?>
            <div class="flex flex-row flex-wrap items-center justify-center p-2 w-full">
                <div></div>
                <button onclick="printDiv('printArea')" class="inline-flex items-center bg-blue-300 border border-blue-400 text-white text-sm space-x-2 px-3 py-1 shadow-lg ring ring-3 ring-dark rounded-md">
                    <ion-icon name="print-outline"></ion-icon>
                    <span>Print</span>
                </button>
            </div>
            <div id="printArea" class="relative flex flex-col w-full p-4 bg-white" style="overflow-x: auto;">
                <p class="text-center text-md-center text-gray-700 uppercase font-bold">Independent National Electoral Commission</p>
                <p class="text-center text-sm text-gray-600">81 Murtala Mohammed Highway, Calabar</p>
                <p class="text-center text-sm text-gray-600">Opposite Pyramid Hotel Calabar, Cross River State</p>
                <p class="text-center text-sm italic mt-4 mb-2 text-gray-500">Pay Slip For <?=MONTH_WITH_NAMES[substr(explode('-', $payslip_date)[1], -1, 1)] . ', ' . explode('-', $payslip_date)[0]?></p>
                <table class="table table-zebra table-fixed w-full border border-gray-600">
                    <tr>
                        <td class="font-semibold text-sm">Staff File No.:</td>
                        <td class="italic"><?=ucfirst($result->file_no)?></td>
                        <td class="font-semibold">Name:</td>
                        <td class="italic"><?=strtoupper($result->staff_name)?></td>
                        <td class="font-semibold">Pay Point:</td>
                        <td class="italic">
                            <span><?=strtoupper($account_records['bank_name'])?></span>&nbsp;(<?=strlen($account_records['bank_code']) <= 2 ? '0' . $account_records['bank_code'] : $account_records['bank_code']?>)
                            <span> - <?=$account_records['account_num']?></span>
                        </td>
                    </tr>
                    <tr class="pt-5 pb-5 border border-gray-600">
                        <td colspan="2" class="border border-gray-600 font-semibold p-2">EARNINGS</td>
                        <td colspan="2" class="border border-gray-600 font-semibold p-2">DEDUCTIONS</td>
                        <td colspan="2" class="border border-gray-600 font-semibold p-2">TAX INFORMATION</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="border border-gray-600" style="padding:0!important">
                            <table class="border-collapse w-full">
                                <tr>
                                    <td class="flex items-center justify-between font-mono">
                                        <div>Basic Pay</div>
                                        <div><?=CURRENCY_NAIRA . number_format((float)$salary->monthly_consolidated_salary, 2)?></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="items-center pt-3 pb-3 font-semibold">
                                        Allowances
                                    </td>
                                </tr>
                                <tr>
                                    <td class="flex items-center justify-between font-mono">
                                        <div>Transport</div>
                                        <div><?=CURRENCY_NAIRA?>0.00</div>
                                    </td>
                                    <td class="flex items-center justify-between font-mono">
                                        <div>Rent</div>
                                        <div>0.00</div>
                                    </td>
                                    <td class="flex items-center justify-between font-mono">
                                        <div>Utility</div>
                                        <div>0.00</div>
                                    </td>
                                    <td class="flex items-center justify-between font-mono">
                                        <div>Meal</div>
                                        <div>0.00</div>
                                    </td>
                                    <td class="flex items-center justify-between font-mono">
                                        <div>Driver Allowance</div>
                                        <div><?=CURRENCY_NAIRA . number_format(($salary->drivers == NULL || $salary->drivers == 0) ? 0 : (float)$salary->drivers, 2)?></div>
                                    </td>
                                    <td class="flex items-center justify-between font-mono">
                                        <div>Personal</div>
                                        <div>0.00</div> 
                                    </td>
                                    <td class="flex flex-wrap items-center justify-between font-mono">
                                        <div>Vehicle Maint. & Fuel</div>
                                        <div>0.00</div>
                                    </td>
                                    <td class="flex items-center justify-between font-mono">
                                        <div>Furniture</div>
                                        <div>0.00</div>
                                    </td>
                                    <td class="flex items-center justify-between font-mono">
                                        <div>Entertainment</div>
                                        <div><?=CURRENCY_NAIRA . number_format(($salary->entertainment == NULL || (float)$salary->entertainment == 0) ? 0 : (float)$salary->entertainment, 2)?></div>
                                    </td>
                                    <td class="flex items-center justify-between font-mono">
                                        <div>Medical</div>
                                        <div>0.00</div>
                                    </td>
                                    <td class="flex items-center justify-between font-mono">
                                        <div>Hazard</div>
                                        <div><?=CURRENCY_NAIRA . number_format(($salary->hazard == NULL || $salary->hazard == 0) ? 0 : (float)$salary->hazard, 2)?></div>
                                    </td>
                                    <td class="flex items-center justify-between font-mono">
                                        <div>Responsibility</div>
                                        <div><?=CURRENCY_NAIRA . number_format(($salary->responsibility == NULL || $salary->responsibility == 0) ? 0 : (float)$salary->responsibility, 2)?></div>
                                    </td>
                                    <td class="flex items-center justify-between font-mono">
                                        <div>Electoral Duty</div>
                                        <div>0.00</div>
                                    </td>
                                    <td class="flex items-center justify-between font-mono">
                                        <div>Shift Allow.</div>
                                        <div>0.00</div>
                                    </td>
                                    <td class="flex items-center justify-between font-mono">
                                        <div>Leave Grant</div>
                                        <div>0.00</div>
                                    </td>
                                    <td class="flex items-center justify-between font-mono">
                                        <div>Overtime</div>
                                        <div>0.00</div>
                                    </td>
                                    <td class="flex items-center justify-between font-mono">
                                        <div>Bonus(es)</div>
                                        <div>0.00</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="items-center pt-3 pb-3 font-semibold">
                                        Arrears
                                    </td>
                                </tr>
                                <tr>
                                    <td class="flex items-center justify-between font-mono">
                                        <div>Salary (NTX)</div>
                                        <div>0.00</div>
                                    </td>
                                    <td class="flex items-center justify-between font-mono">
                                        <div>Salary (TX)</div>
                                        <div>0.00</div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td colspan="2" class="border border-gray-600" style="padding:0!important">
                            <table class="border-collapse w-full">
                                <tr>
                                    <td class="flex items-center justify-between font-mono">
                                        <div>Tax <em class="text-xs italic">(this month)</em></div>
                                        <?php
                                            $tax = ($deduction_records['tax'] == NULL || $deduction_records['tax'] == 0) ? 0 : (float)$deduction_records['tax'];
                                        ?>
                                        <div><?=CURRENCY_NAIRA . number_format($tax ,2)?></div>
                                    </td>
                                    <td class="flex items-center justify-between font-mono">
                                        <div>Housing Fund <em class="text-xs italic">(NHF)</em></div>
                                        <?php 
                                            $nhf = ($deduction_records['nhf'] == NULL || $deduction_records['nhf'] == 0) ? 0 : (float)$deduction_records['nhf'];
                                        ?>
                                        <div><?=CURRENCY_NAIRA . number_format($nhf, 2)?></div>
                                    </td>
                                    <td class="flex items-center justify-between font-mono">
                                        <div>Housing <em class="text-xs italic">(NHF)</em> Loan</div>
                                        <div>0.00</div>
                                    </td>
                                    <td class="flex items-center justify-between font-mono">
                                        <div>Vehicle Loan</div>
                                        <div>0.00</div>
                                    </td>
                                    <td class="flex items-center justify-between font-mono">
                                        <div>Furniture Loan</div>
                                        <div>0.00</div>
                                    </td>
                                    <td class="flex items-center justify-between font-mono">
                                        <div>Personal Loan</div>
                                        <div>0.00</div>
                                    </td>
                                    <td class="flex items-center justify-between font-mono">
                                        <div>Salary Advance</div>
                                        <div>0.00</div>
                                    </td>
                                    <td class="flex items-center justify-between font-mono">
                                        <div>Overpayment</div>
                                        <div>0.00</div>
                                    </td>
                                    <td class="flex items-center justify-between font-mono">
                                        <div>NHIS</div>
                                        <div>0.00</div>
                                    </td>
                                    <td class="flex items-center justify-between font-mono">
                                        <div>CPS</div>
                                        <?php
                                            $cps = ($deduction_records['cps'] == NULL || $deduction_records['cps'] == 0) ? 0 : (float)$deduction_records['cps'];
                                        ?>
                                        <div><?=CURRENCY_NAIRA . number_format($cps ,2)?></div>
                                    </td>
                                    <td class="flex items-center justify-between font-mono">
                                        <div>MPCS - Contribution</div>
                                        <?php
                                            $co_op = ($deduction_records['co_operative'] == NULL || $deduction_records['co_operative'] == 0) ? 0 : (float)$deduction_records['co_operative']; 
                                        ?>
                                        <div><?=CURRENCY_NAIRA . number_format($co_op ,2)?></div>
                                    </td>
                                    <td class="flex items-center justify-between font-mono">
                                        <div>Welfare</div>
                                        <?php
                                            $welfare = ($deduction_records['welfare'] == NULL || $deduction_records['welfare'] == 0) ? 0 : (float)$deduction_records['welfare'];
                                        ?>
                                        <div><?=CURRENCY_NAIRA . number_format($welfare ,2)?></div>
                                    </td>
                                    <td class="flex items-center justify-between font-mono">
                                        <div>MPCS - Dues</div>
                                        <?php
                                            $co_op_dues = ($deduction_records['co_operative_dues'] == NULL || $deduction_records['co_operative_dues'] == 0) ? 0 : (float)$deduction_records['co_operative_dues'];
                                        ?>
                                        <div><?=CURRENCY_NAIRA . number_format($co_op_dues, 2)?></div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td colspan="2" class="border border-gray-600" style="padding:0!important">
                            <table class="border-collapse w-full">
                                <tr>
                                    <td class="flex items-center justify-between font-mono">
                                        <div>Total Gross To Date</div>
                                        <div>0.00</div>
                                    </td>
                                    <td class="flex items-center justify-between font-mono">
                                        <div>Total Tax To Date</div>
                                        <div>0.00</div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="border border-gray-500 p-2">
                            <div class="w-full flex flex-wrap items-center justify-between font-semibold font-mono">
                                <div class="mr-6">Total Earnings</div>
                                <div>=<?=CURRENCY_NAIRA . number_format($total_allowance, 2)?></div>
                            </div>
                        </td>
                        <td colspan="2" class="border border-gray-500 p-2">
                            <div class="w-full flex flex-wrap items-center justify-between font-semibold font-mono">
                                <div class="mr-6">Total Deductions</div>
                                <?php
                                    $tot_ded = $tax + $co_op + $welfare + $nhf + $co_op_dues + $cps;
                                ?>
                                <div>=<?=CURRENCY_NAIRA . number_format($tot_ded, 2)?></div>
                            </div>
                        </td>
                        <td colspan="2" class="border border-gray-500 p-2">
                            <div class="w-full flex flex-wrap items-center justify-between font-semibold font-mono">
                                <div class="mr-6">Net Pay</div>
                                <div>=<?=CURRENCY_NAIRA . number_format($netpay, 2)?></div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6" class="text-center p-2 font-bold text-2xl font-mono">
                            <p class="text-dark">Total Emolument =<?=CURRENCY_NAIRA . number_format($emolument, 2)?></p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6" class="text-center"><!-- If theres ever a need to create signatory --></td>
                    </tr>
                </table>
                <div class="flex items-center justify-between text-xs mt-5">
                    <div class="flex flex-col space-y-1">
                        <img src='<?= $qrcode ?>' alt='QR Code' class="w-16 h-16">
                        <p class="text-xs">Scan to verify staff</p>
                    </div>
                    <div class="flex flex-col gap-y-1">
                        <span>Document Generated on <em><?=date('d-m-Y')?></em></span>
                        <span><?=(isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '')?></span>
                    </div>
                </div>
                
                <!--
                -- Watermark
                -->
                <div class="absolute top-1/3 left-1/3 right-1/3">
                    <img src="<?=base_url('imgs/inec-nigeria-logo.jpg')?>" alt="Watermark" class="opacity-25">
                </div>
            </div>
            <div class="flex flex-row flex-wrap items-center justify-center p-2 w-full">
                <div></div>
                <button onclick="printDiv('printArea')" class="inline-flex items-center bg-blue-300 border border-blue-400 text-white text-sm space-x-2 px-3 py-1 shadow-lg ring ring-3 ring-dark rounded-md">
                    <ion-icon name="print-outline"></ion-icon>
                    <span>Print</span>
                </button>
            </div>
            <?php }else{?>
            <div id="containerSearchIllustration" class="hidden flex-col h-full w-full space-y-2 items-center justify-center">
                <svg width="280" height="280" viewBox="0 0 280 280" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M52.6631 127.029C52.6631 127.029 91.434 125.477 99.8125 61.7456C107.253 5.14629 172.631 30.9083 191.529 53.4701C216.01 82.6971 202.96 132.974 234.629 139.325C266.299 145.676 245.618 216.292 197.546 209.533C137.746 201.125 152.214 236.069 134.262 250.859C121.379 261.475 68.5515 251.256 66.7908 212.723C65.3092 180.297 51.6315 180.4 41.9366 176.723C27.9544 171.421 19.1441 133.017 52.6631 127.029Z" fill="#DEE9FF"/>
                    <path d="M184.462 197.807L146.371 160.168L138.828 167.801L176.92 205.44L184.462 197.807Z" fill="#699CFF"/>
                    <path d="M199.013 207.92L169.378 178.637C169.213 178.474 168.947 178.476 168.784 178.641L157.568 189.992C157.405 190.157 157.406 190.423 157.571 190.586L187.206 219.869C187.371 220.032 187.637 220.031 187.8 219.866L199.017 208.514C199.18 208.349 199.178 208.083 199.013 207.92Z" fill="#0E84E5"/>
                    <path d="M112.611 179.097C138.816 179.097 160.06 157.853 160.06 131.648C160.06 105.442 138.816 84.1982 112.611 84.1982C86.4051 84.1982 65.1613 105.442 65.1613 131.648C65.1613 157.853 86.4051 179.097 112.611 179.097Z" fill="#0E84E5"/>
                    <path d="M112.611 171.355C134.54 171.355 152.318 153.578 152.318 131.648C152.318 109.718 134.54 91.9407 112.611 91.9407C90.6811 91.9407 72.9036 109.718 72.9036 131.648C72.9036 153.578 90.6811 171.355 112.611 171.355Z" fill="#D4E5FF"/>
                    <path d="M192.83 88.7531C181.7 85.1454 169.672 91.247 166.049 102.423C162.442 113.553 168.543 125.581 179.719 129.203C190.895 132.825 202.892 126.664 206.5 115.533C210.108 104.403 203.96 92.3606 192.83 88.7531ZM189.471 99.1145C190.717 99.5183 191.815 100.283 192.626 101.312C193.436 102.34 193.923 103.587 194.024 104.892C194.126 106.198 193.837 107.504 193.195 108.646C192.552 109.787 191.586 110.712 190.417 111.303C189.249 111.894 187.931 112.125 186.631 111.966C185.331 111.807 184.107 111.266 183.115 110.411C182.124 109.556 181.408 108.425 181.06 107.163C180.711 105.9 180.746 104.563 181.158 103.32C182.273 99.8813 186.032 97.9999 189.471 99.1145ZM181.068 125.041C177.37 123.848 174.202 121.407 172.106 118.136C176.029 115.907 180.13 115.286 183.84 116.489C187.55 117.692 190.567 120.569 192.377 124.706C188.76 126.126 184.762 126.244 181.068 125.041Z" fill="#418DF9"/>
                    <path d="M100.191 190.176C98.258 191.163 96.6608 192.701 95.6016 194.595C94.5424 196.49 94.0688 198.656 94.2406 200.82C94.4125 202.983 95.2221 205.047 96.5671 206.751C97.9121 208.455 99.7321 209.721 101.797 210.39C103.862 211.06 106.078 211.101 108.167 210.511C110.256 209.92 112.122 208.723 113.531 207.072C114.939 205.42 115.826 203.388 116.08 201.233C116.333 199.077 115.942 196.895 114.955 194.961C113.629 192.371 111.331 190.413 108.563 189.516C105.795 188.618 102.784 188.856 100.191 190.176ZM102.747 195.184C103.349 194.876 104.029 194.755 104.701 194.834C105.372 194.914 106.005 195.191 106.518 195.63C107.032 196.07 107.403 196.652 107.585 197.303C107.768 197.954 107.752 198.645 107.541 199.287C107.331 199.93 106.934 200.495 106.401 200.911C105.869 201.328 105.225 201.577 104.55 201.626C103.876 201.676 103.202 201.525 102.614 201.191C102.027 200.857 101.551 200.356 101.248 199.752C100.847 198.946 100.779 198.015 101.06 197.16C101.34 196.305 101.947 195.594 102.747 195.183V195.184ZM109.143 207.714C107.358 208.628 105.311 208.893 103.352 208.464C103.97 206.219 105.24 204.496 107.034 203.581C108.827 202.665 110.978 202.615 113.149 203.464C112.347 205.302 110.931 206.804 109.143 207.713V207.714Z" fill="#418DF9"/>
                </svg>
                <p id="responseText" class="text-gray-400 text-xs font-sans pb-8 mb-4 font-semibold">Generated result will be displayed here</p>
            </div> 
            <?php }?>  
        </div>
    </div>
