<div class="w-full mt-0 text-left">
  <nav aria-label="breadcrumb" class="w-max">
    <ol class="flex w-full flex-wrap items-center rounded-md bg-blue-gray-50 bg-opacity-60 py-2 px-4">
      <li class="flex cursor-pointer items-center font-sans text-sm font-normal leading-normal text-blue-gray-900 antialiased transition-colors duration-300 hover:text-blue-300">
        <a class="opacity-60" href="<?=base_url()?>">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
          </svg>
        </a>
        <span class="pointer-events-none mx-2 select-none font-sans text-sm font-normal leading-normal text-blue-gray-500 antialiased">
          /
        </span>
      </li>
      <li class="flex cursor-pointer items-center font-sans text-sm font-normal leading-normal text-blue-gray-900 antialiased transition-colors duration-300 hover:text-blue-300">
        <a class="opacity-60" href="<?=base_url('home/manual')?>">
          <span>Pay Slip</span>
        </a>
        <span class="pointer-events-none mx-2 select-none font-sans text-sm font-normal leading-normal text-blue-gray-500 antialiased">
          -
        </span>
      </li>
      <li class="flex cursor-default pointer-events-none items-center font-sans text-sm font-medium leading-normal text-blue-gray-900 antialiased transition-colors duration-300 hover:text-blue-300 text-gray-500">
        <span>
          Generated Pay Slip
        </span>
      </li>
    </ol>
  </nav>
</div>
<div class="w-full flex flex-col min-h-96 bg-zinc-100 rounded-lg pt-6 pb-6">
    <?php
        if($records){?>
        <div class="flex flex-row flex-wrap items-center justify-center p-2 mt-2 w-full">
            <div></div>
            <button onclick="printDiv('printArea')" class="inline-flex items-center bg-blue-300 border border-blue-400 text-white text-sm space-x-2 px-3 py-1 shadow-lg ring ring-3 ring-dark rounded-md">
                <i data-feather="printer"></i>
                <span>Print</span>
            </button>
        </div>
        <div id="printArea" class="flex flex-col w-full p-4">
            <p class="text-center text-md-center text-gray-700 uppercase font-bold">Independent National Electoral Commission</p>
            <p class="text-center text-sm text-gray-600">81 Murtala Mohammed Highway, Calabar</p>
            <p class="text-center text-sm text-gray-600">Opposite Pyramid Hotel Calabar, Cross River State</p>
            <p class="text-center text-sm italic mt-4 mb-2 text-gray-500">Pay Slip For <?=MONTH_WITH_NAMES[$records['month']] . '(' . $records['month'] . ')' . ', ' . $records['year']?></p>
            <table class="table table-fixed w-full border border-gray-600">
                <tr>
                    <td class="font-semibold text-sm">Staff File No.:</td>
                    <td class="italic">INEC/CRS/<?=ucfirst($records['file_no'])?></td>
                    <td class="font-semibold">Name:</td>
                    <td class="italic"><?=strtoupper($records['staff_name'])?></td>
                    <td class="font-semibold">Pay Point:</td>
                    <td class="italic">
                        <span><?=strtoupper($records['pay_point'])?></span>
                    </td>
                </tr>
                <tr class="pt-5 pb-5 border border-gray-600">
                    <td colspan="2" class="border font-semibold p-2 text-white" style="background-color:#13171D">EARNINGS</td>
                    <td colspan="2" class="border font-semibold p-2 text-white" style="background-color:#13171D">DEDUCTIONS</td>
                    <td colspan="2" class="border font-semibold p-2 text-white bg-gray-800" style="background-color:#13171D">TAX INFORMATION</td>
                </tr>
                <tr>
                    <td colspan="2" class="border border-gray-600">
                        <table class="border-collapse w-full">
                            <tr>
                                <td class="flex items-center justify-between font-mono">
                                    <div>Basic Pay</div>
                                    <div><?=CURRENCY_NAIRA . number_format($records['gross'], 2)?></div>
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
                                    <div><?=CURRENCY_NAIRA . number_format($records['transport'], 2)?></div>
                                </td>
                                <td class="flex items-center justify-between font-mono">
                                    <div>Rent</div>
                                    <div>0.00</div>
                                </td>
                                <td class="flex items-center justify-between font-mono">
                                    <div>Utility</div>
                                    <div><?=CURRENCY_NAIRA . number_format($records['utility'], 2)?></div>
                                </td>
                                <td class="flex items-center justify-between font-mono">
                                    <div>Meal</div>
                                    <div><?=CURRENCY_NAIRA . number_format($records['meal'], 2)?></div>
                                </td>
                                <td class="flex items-center justify-between font-mono">
                                    <div>Driver Allowance</div>
                                    <div><?=CURRENCY_NAIRA . number_format($records['driver_allowance'], 2)?></div>
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
                                    <div><?=CURRENCY_NAIRA . number_format($records['entertainment'], 2)?></div>
                                </td>
                                <td class="flex items-center justify-between font-mono">
                                    <div>Medical</div>
                                    <div>0.00</div>
                                </td>
                                <td class="flex items-center justify-between font-mono">
                                    <div>Hazard</div>
                                    <div><?=CURRENCY_NAIRA . number_format($records['electoral'], 2)?></div>
                                </td>
                                <td class="flex items-center justify-between font-mono">
                                    <div>Responsibility</div>
                                    <div><?=CURRENCY_NAIRA . number_format($records['responsibility'], 2)?></div>
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
                                    <div><?=CURRENCY_NAIRA . number_format($records['overtime'], 2)?></div>
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
                    <td colspan="2" class="border border-gray-600 p-2">
                        <table class="border-collapse w-full">
                            <tr>
                                <td class="flex items-center justify-between font-mono">
                                    <div>Taxation</div>
                                    <div><?=CURRENCY_NAIRA . number_format($records['tax'], 2)?></div>
                                </td>
                                <td class="flex items-center justify-between font-mono">
                                    <div>Housing Loan</div>
                                    <div><?=CURRENCY_NAIRA . number_format($records['housing'], 2)?></div>
                                </td>
                                <td class="flex items-center justify-between font-mono">
                                    <div>Welfare Dues</div>
                                    <div><?=CURRENCY_NAIRA . number_format($records['welfare_dues'], 2)?></div>
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
                                    <div>Co-operative Dues</div>
                                    <div><?=CURRENCY_NAIRA . number_format($records['co_operative_dues'], 2)?></div>
                                </td>
                                <td class="flex items-center justify-between font-mono">
                                    <div>Co-operative Loan</div>
                                    <div><?=CURRENCY_NAIRA . number_format($records['co_operative_loan'], 2)?></div>
                                </td>
                                <td class="flex items-center justify-between font-mono">
                                    <div>CPS</div>
                                    <div><?=CURRENCY_NAIRA . number_format($records['cps'], 2)?></div>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td colspan="2" class="border border-gray-600 p-2">
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
                            <div>= <?=CURRENCY_NAIRA . number_format($records['total_earnings'], 2)?></div>
                        </div>
                    </td>
                    <td colspan="2" class="border border-gray-500 p-2">
                        <div class="w-full flex flex-wrap items-center justify-between font-semibold font-mono">
                            <div class="mr-6">Total Deductions</div>
                            <div>= <?=CURRENCY_NAIRA . number_format($records['total_deduction'], 2)?></div>
                        </div>
                    </td>
                    <td colspan="2" class="border border-gray-500 p-2">
                        <div class="w-full flex flex-wrap items-center justify-between font-semibold font-mono">
                            <div class="mr-6">Net Pay</div>
                            <div>= <?=CURRENCY_NAIRA . number_format($records['net_pay'], 2)?></div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="6" class="text-center p-2 font-bold text-2xl font-mono">
                        <p class="text-dark">Total Emolument =<?=CURRENCY_NAIRA . number_format($records['total_emolument'], 2)?></p>
                    </td>
                </tr>
                <tr>
                    <td colspan="6" class="text-center"><!-- If theres ever a need to create signatory --></td>
                </tr>
            </table>
            <p class="flex items-center justify-between text-xs mt-5">
                <span>Document Generated on <em><?=date('d-m-Y')?></em></span>
                <span><?=$_SERVER['HTTP_REFERER']?></span>
            </p>
        </div>
        <div class="flex flex-row flex-wrap items-center justify-center p-2 mt-2 w-full">
            <div></div>
            <button onclick="printDiv('printArea')" class="inline-flex items-center bg-blue-300 border border-blue-400 text-white text-sm space-x-2 px-3 py-1 shadow-lg ring ring-3 ring-dark rounded-md">
                <i data-feather="printer"></i>
                <span>Print</span>
            </button>
        </div>
        <?php }
    ?>
</div>