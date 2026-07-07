<?php
//ghif settings
$currency_name='$';
$ghif_introduction='Ghif software';

//language settings
$language_direction='ltr';
$language_align='left';
$date_type='gregorian'; 

//theme name
$theme_select_title='select theme';
$theme_default='default';
$theme_wood='wood';
$theme_yellow='yellow';

//ghif main title
$word_for_sale='sale';
$word_for_accounting='accounting';
$word_for_storage='inventory';
$word_for_ghif_administrator='administrator';

//index.php
$login_window_header='login';
$index_title='Ghif';
$index_select_product_title='Select Product';
$login_window_user_placeHolder='username';
$login_window_pass_placeHolder='password';
$login_window_submit_value='login';
$login_window_designer_text='Designer'; ///
$login_cash_list_select='entering cash : ';

//modules/Sliding_login_panel_jquery/slide.php
$slide_select_language_title='select language';
$slide_name='name';
$slide_family='family';
$slide_grade='grade';
$slide_entering_cash='entering cash';
$slide_about_ghif='			
					<h1><a href="http://ghif.org">ghif.org - Ghif</a></h1>				
					<p>
                    This software designed by <span style="color:#FC0">Ali Farhangmehr</span>
                    <br />
                    for more information you always can email me at 
                    <br />
                    ali.farhangmehr@gmail.com
                    <br />
                    or call me
                    +989124673577
                    <br />
                    Be lucrative 
                    <br />
                    And special thanks to all who supperted me on this
                    <br />
					Mrs. F. Farahani , Mr. K. Kousari , Mrs. F. Hadavand , Mr. M. Akhtari
                    <br />
                    
                    <br />
                    
                    </p>';
$slide_welcome='welcome';
$slide_come_down='come down';
$slide_go_up='go up';

//login.php
$login_title='Entering admin area';
$login_correct_message='information is correct';
$login_redirect_message='You will redirect after 2 second ';
$login_incorrect_message='username or password is incorrect';

//select.php
$select_title='select product';

//sale/index.php
$saleIndex_title='sale';
$saleIndex_show_good='show good';
$saleIndex_add_good='add good';
$saleIndex_create_sale_factor='sale factor';
$saleIndex_create_purchase_factor='purchase factor';
$saleIndex_show_customer='customer management';
$saleIndex_show_factor='show factor';
$saleIndex_manage_cash='cash management';
$saleIndex_manage_backup='backup management';
$saleIndex_chart='report management';
$saleIndex_opponent_account='opponent account';
$saleIndex_roll_account='account trun over';
$saleIndex_manage_order='order management'; ///
$saleIndex_show_outgo='withdrawal from cash';
$saleIndex_sign_out='signout';
$saleIndex_ghif_settings='ghif management';
$saleIndex_add_cash='clear cash';

//sale/showGood.php
$showGood_title='show good';
$showGood_good_name='name';
$showGood_good_price='price';
$showGood_good_barcode='barcode';
$showGood_print_barcode='print barcode';
$showGood_warehouse='storage';
$showGood_search_input_placeholder='search by good name and barcode';
$showGood_show_all_title='show all'; ///
$showGood_good_count='good count';

//sale/showFacotr.php
$showFactor_title='show factor';
$showFactor_factor_barcode='barcode';
$showFactor_factor_totall_price='total price';
$showFactor_factor_discount='discount';
$showFactor_factor_cash='cash payment';
$showFactor_factor_card='card payment';
$showFactor_factor_date='date';
$showFactor_factor_type='factor type';
$showFactor_factor_count='count';
$showFactor_search_input_placeholder='search by factor No.,barcode,price';
$showFactor_factor_number='factor No.';
$showFactor_factor_cashList='cash';

//class/table.php
$table_table_number='No.';
$table_delete_table='delete';
$table_edit_table='details';
$table_show_delete_div_are_you_sure='Are you sure !?';
$table_show_delete_div_yes='Yes';
$table_show_delete_div_no='No';
$table_oa_legal='legal';
$table_oa_real='real';
$table_cancel_factor='cancel';
$table_uncancel_factor_title='un cancell';
$table_cancel_factor_title='cancel';
$table_add_item='add new item';

//general/logout.php
$logout_title='signing out from Ghif';
$logout_sign_out_successfully='You have successfully logged out of Ghif management';
$logout_sign_out_successfully_message='You will redirect to main page after two second';
$logout_sign_out_unsuccessfull_message='Difficulty in exiting account please for definitive exit, close the browser window';

//general/mustLogin.php
$mustLogin_title='You need to login';
$mustLogin_you_need_login_message='For accessing this area you first need to login';
$mustLogin_click_here_to_login='Click here for loging';

//general/accessDenied.php
$accessDenied_title='Access denied';
$accessDenied_message='Your colleagues you have not access to view this page.';
$accessDenied_goBack_message='back';

//sale/addGood.php
$addGood_title='add good';
$addGood_table_title='add good';
$addGood_good_name='good name';
$addGood_good_sell_price='sell price';
$addGood_good_purchase_price='purchase price';
$addGood_good_barcode='barcode';
$addGood_submit_value='add good';
$addGood_if_want_barcode_text='To create barcodes to automatically choose this option'; ///
$addGood_successfully_added_message='successfully added';

//sale/editGood.php
$editGood_title='edit good';
$editGood_table_title='edit good';
$editGood_good_name='good name';
$editGood_good_sell_price='sell price';
$editGood_good_purchase_price='purchase price';
$editGood_good_barcode='barcode';
$editGood_submit_value='edit good';
$editGood_successfully_editeed_message='successfully added';

//sale/showOutgo.php
$showOutgo_title='show outgo';
$showOutgo_date='date';
$showOutgo_type='outgo type';
$showOutgo_price='price';
$showOutgo_comments='comments';
$showOutgo_cashList='cash';
$showOutgo_employe_name='name';
$showOutgo_employe_family='family';
$showOutgo_search_input_placeholder='search by price,comments';
$showOutgo_outgo_count='count';
$showOutgo_type_cash='cash';
$showOutgo_type_card='credit';

//sale/showCustomer.php
$showCustomer_title='customer list';
$showCustomer_customer_photo='customer photo';
$showCustomer_customer_name='name';
$showCustomer_customer_family='family';
$showCustomer_customer_mobile='mobile';
$showCustomer_customer_tel='tel';
$showCustomer_customer_email='email';
$showCustomer_customer_membershipDate='membership date';
$showCustomer_customer_membershipDuration='membership duration';
$showCustomer_customer_birthday='birthday';
$showCustomer_customer_address='address';
$showCustomer_customer_count='count';
$showCustomer_search_input_placeholder='serach by customer name';
$showCustomer_customer_comments='comments';

//sale/showInventoryDetails.php
$showInventoryDetails_title='view Product Details in Stock';
$showInventoryDetails_storeName='store name';
$showInventoryDetails_stock='stock';
$showInventoryDetails_date='Last modified stock';
$showInventoryDetails_comments='details';
$showInventoryDetails_sum='sum';
$showInventoryDetails_totalStock='total';
$showInventoryDetails_good='good';
$showInventoryDetails_change='change in store';
$showInventoryDetails_displacement='displacement between stores';

//sale/showOa.php
$showOa_title='show oppinond account';
$showOa_name='name';
$showOa_family='family';
$showOa_type='type';
$showOa_address='address';
$showOa_tel='tel';
$showOa_mobile='mobile';
$showOa_comments='comments';
$showOa_company='company';
$showOa_accountTurnover='account turnover';
$showOa_oa_count='count';
$showOa_search_input_placeholder='search by name,contact info.';

//ausu_autosuggest
$ausu_autosuggest_unRegistered='not registered';
$ausu_autosuggest_notFound='no item found';
$ausu_autosuggest_name='name';
$ausu_autosuggest_company='company';

//sale/addFactor.php
$addFactor_title='add sell factor';
$addFactor_good_name='good name';
$addFactor_good_barcode='barcode';
$addFactor_good_count='count';
$addFactor_good_price='price';
$addFactor_good_discount='discount';
$addFactor_good_storage='sell storage';
$addFactor_good_print_paper_type='factor paper type';
$addFactor_table_title='sale factor';
$addFactor_submit_value='add good';
$addFactor_good_payable='payable';
$addFactor_good_a4='A4 paper';
$addFactor_good_roll='roll paper';
$addFactor_fill_good_name='fill good name';
$addFactor_fill_barcode='or barcode';
$addFactor_price_type_static='direct';
$addFactor_price_type_percentage='percentage';
$addFactor_oa_name='oppinient account';

//sale/addFactorA.php
$addFactorA_print_factor='print factor';
$addFactorA_delete_purchase='delete';

//sale/showFactorExtra.php
$showFactorExtra_title='factor extra field management';
$showFactorExtra_name='field name';
$showFactorExtra_price_type='price type';
$showFactorExtra_price='price';
$showFactorExtra_default_yes='yes';
$showFactorExtra_default_no='no';
$showFactorExtra_default='default';
$showFactorExtra_percentage='percentage';
$showFactorExtra_static='static';

//sale/addFactorA4P.php
$addFactorA4P_saleFactor='sale factor';
$addFactorA4P_customer='customer';
$addFactorA4P_date_and_time='date and time';
$addFactorA4P_balance='balance ';
$addFactorA4P_debtor='debtor ';
$addFactorA4P_creditor='creditor ';
$addFactorA4P_current_balance='current balance';

//sale/addFactorP.php
$addFactorP_title='print factor';
$addFactorP_auto_add='Add automatically recorded by the system due to factors Sale ';
$addFactorP_number='No.';
$addFactorP_good='good';
$addFactorP_price='price';
$addFactorP_discount='discount';
$addFactorP_count='count';
$addFactorP_total_price='total price';
$addFactorP_factor_number='factor No.';
$addFactorP_add_auto_account_comment='Add document is automatically recorded due to factors';
$addFactorP_total_discount='total discount';
$addFactorP_payable='payable';
$addFactorP_factor_barcode='factor barcode';
$addFactorP_thanks_for_shopping='Thank you for your purchase';
$addFactorP_ghif_introduction='Ghif sales software';

//sale/addFactorExtra.php
$addFactorExtra_title='add field to factor';
$addFactorExtra_field_name='field name';
$addFactorExtra_pticeType='price type';
$addFactorExtra_price='price';
$addFactorExtra_default='show';
$addFactorExtra_pticeType_prcentage='percentage';
$addFactorExtra_pticeType_static='static';
$addFactorExtra_default_yes='yes';
$addFactorExtra_default_no='no';
$addFactorExtra_submit='add field';

//sale/editFactorExtra.php
$editFactorExtra_title='edit factor field';
$editFactorExtra_submit='edit field';
$editFactorExtra_field_name='field name';
$editFactorExtra_pticeType='price type';
$editFactorExtra_price='price';
$editFactorExtra_default='default';
$editFactorExtra_pticeType_prcentage='percentage';
$editFactorExtra_pticeType_static='static';
$editFactorExtra_default_yes='yes';
$editFactorExtra_default_no='no';
$editFactorExtra_successfully_edited_message='Successfully edited';

//sale/factorPayment.php
$factorPayment_title='select payment type';
$factorPayment_table_header='select payment type';
$factorPayment_balance_submit_value='register payment type';
$factorPayment_not_balance_submit_value='The amounts do not match';
$factorPayment_total_cost='total price';
$factorPayment_all_cash_title='total amount of the payment with card';
$factorPayment_all_card_title='total amount of the payment with cash';

//sale/addOa.php
$addOa_title='add opinion account';
$addOa_type='type';
$addOa_name='name';
$addOa_family='family';
$addOa_company='company';
$addOa_address='address';
$addOa_tel='tel';
$addOa_mobile='mobile';
$addOa_comments='comments';
$addOa_type_real='real';
$addOa_type_legal='legal';
$addOa_submit='add';
$addOa_successfully_added_message='Adding opinion account successfully done';

//sale/editOa.php
$editOa_title='edit opinion account';
$editOa_successfully_edited_message='Successfully edited';
$editOa_type='type';
$editOa_name='name';
$editOa_family='family';
$editOa_company='company';
$editOa_address='address';
$editOa_tel='tel';
$editOa_mobile='mobile';
$editOa_comments='comments';
$editOa_type_real='real';
$editOa_type_legal='legal';
$editOa_submit='add';

//sale/showCashList.php
$showCashList_title='cash management';
$showCashList_name='cash name';
$showCashList_cashList_count='number';
$showCashList_search_input_placeholder='search by cash name';

//sale/addCashList.php
$addCashList_title='add cash';
$addCashList_name='cash name';
$addCashList_successfully_added_message='The cash was successfully added';
$addCashList_submit='add';

//sale/editCashList.php
$editCashList_title='edit cash';
$editCashList_name='cash name';
$editCashList_successfully_edited_message='Successfully edited';
$editCashList_submit='edit';

//sale/showBackup.php
$showBackup_title='backup management';
$showBackup_backup_count='count';
$showBackup_search_input_placeholder='search by employe name,date';
$showBackup_employe_name='name';
$showBackup_employe_family='family';
$showBackup_date='date';
$showBackup_comments='comments';
$showBackup_download='download';

//sale/addCustomer.php
$addCustomer_title='add customer';
$addCustomer_successfully_added_message='Successfully added';
$addCustomer_name='name';
$addCustomer_family='family';
$addCustomer_membershipNo='membership No.';
$addCustomer_address='address';
$addCustomer_email='email';
$addCustomer_mobile1='mobile 1';
$addCustomer_mobile2='mobile 2';
$addCustomer_tel1='tel 1';
$addCustomer_tel2='tel 2';
$addCustomer_photoSource='original photo';
$addCustomer_photoThumb='thumb photo';
$addCustomer_birthday='birthday';
$addCustomer_membershipDate='register date';
$addCustomer_membershipDuration='membership duration';
$addCustomer_comments='comments';
$addCustomer_submit='add';
$addCustomer_sex='sex';
$addCustomer_type_male='male';
$addCustomer_type_female='female';
$addCustomer_photo_error='Only Jpg format , Max image size : 100 KB';

//sale/editCustomer.php
$editCustomer_title='edit customer';
$editCustomer_successfully_added_message='Successfully edited';
$editCustomer_name='name';
$editCustomer_family='family';
$editCustomer_membershipNo='membership No.';
$editCustomer_address='address';
$editCustomer_email='email';
$editCustomer_mobile1='mobile 1';
$editCustomer_mobile2='mobile 2';
$editCustomer_tel1='tel 1';
$editCustomer_tel2='tel 2';
$editCustomer_photoSource='original photo';
$editCustomer_photoThumb='thumb photo';
$editCustomer_birthday='birthday';
$editCustomer_membershipDate='membership date';
$editCustomer_membershipDuration='membership duration';
$editCustomer_comments='comments';
$editCustomer_submit='edit';
$editCustomer_sex='sex';
$editCustomer_type_male='male';
$editCustomer_type_female='female';
$editCustomer_photo_error='Only Jpg format , Max image size : 100 KB';

//sale/showEmploye.php
$showEmploye_title='employe management';
$showEmploye_id='username';
$showEmploye_name='name';
$showEmploye_family='family';
$showEmploye_birthday='birthday';
$showEmploye_grade='grade';
$showEmploye_tel='tel';
$showEmploye_mobile='mobile';
$showEmploye_address='address';
$showEmploye_salary='salary';
$showEmploye_comments='comments';
$showEmploye_acLevel='access level';
$showEmploye_employe_count='number';
$showEmploye_search_input_placeholder='search by name,family';
$showEmploye_employe_photo='employe photo';

//sale/addCash.php
$addCash_title='show cash clear';
$addCash_please_select_cash='Please choose clear cash';
$addCash_select_cash_submit_value='clear';
$addCash_date_from='from date';
$addCash_date_to='to date';
$addCash_amount_of_cash_sold='cash sell';
$addCash_amount_of_card_sold='card sell';
$addCash_cash_outgo='cash outgo';
$addCash_card_outgo='card outgo';
$addCash_cash_stock='cash stock';
$addCash_card_stock='card stock';
$addCash_clearing_cash='clearing cash';
$addCash_cash_reciver='cash reciver';
$addCash_password_of_cash_reciver='password of cash reciver';
$addCash_comments='comments';
$addCash_clearing_submit_value='clear';
$addCash_cash_information='cash information';

//sale/addOutgo.php
$addOutgo_successfully_added_message='Successfully added';
$addOutgo_title='add withdraw from cash';
$addOutgo_name='employe name';
$addOutgo_family='family';
$addOutgo_address='address';
$addOutgo_price='price';
$addOutgo_factorNumber='factor No.';
$addOutgo_cashName='cash name';
$addOutgo_date='date';
$addOutgo_type='withdraw type';
$addOutgo_type_card='card';
$addOutgo_type_cash='cash';
$addOutgo_comments='comments';
$addOutgo_submit='add';
$addOutgo_wrong_pass='Password is not correct';

//sale/editFactor.php
$editFactor_title='edit factor';

//sale/editFactorA.php
$editFactorA_add_inventory_comment='Add auto due to change sale factor';

//sale/deleteEditFactorA.php
$deleteEditFactorA_remove_inventory_comment='Automatic removal because of returned merchandise from sale factor';

//sale/addCashP.php
$addCashP_title='clearing cash';
$addCashP_cash_sale='cash sale';
$addCashP_card_sale='card sale';
$addCashP_cash_outgo='cash outgo';
$addCashP_card_outgo='card outgo';
$addCashP_from_date='date from';
$addCashP_until_date='date to';
$addCashP_delivered_to='deliverd to';
$addCashP_cashier='cashier';
$addCashP_cash_stock='cash stock';
$addCashP_card_stock='card stock';
$addCashP_comments='comments';
$addCashP_total_info='total information';
$addCashP_cash='cash';
$addCashP_card='card';
$addCashP_price_to='price to';
$addCashP_sale='sale';
$addCashP_outgo='outgo';
$addCashP_wrong_password='Password is wrong';
$addCashP_back='back';

//sale/showCash.php
$showCash_title='cash management';
$showCash_cash_count='number';
$showCash_search_input_placeholder='search by name,family,price';
$showCash_count='number';
$showCash_cash_name='cash';
$showCash_reciver_name='recevied by';
$showCash_cashier_name='cashier';
$showCash_date_from='date from';
$showCash_date_to='date to';
$showCash_price='price';
$showCash_comments='comments';
$showCash_print='print';

//sale/cancelFactor.php
$cancelFactor_title='cancel factor';
$cancelFactor_error_message='error on canceling factor';
$cancelFactor_back_link_message='back';
$cancelFactor_auto_add_comment='Returned to the warehouse due to a cancellation factor';

//sale/unCancelFactor.php
$unCancelFactor_title='uncancel factor';
$unCancelFactor_error_message='error on uncanceling factor';
$unCancelFactor_back_link_message='back';
$unCancelFactor_auto_add_comment='Out of stock due to a uncancellation factor';

//sale/editFactorA4P.php
$editFactorA4P_title='edit factor';

//sale/editFactorP.php
$editFactorP_title='edit factor';

//sale/showStore.php
$showStore_title='store management';
$showStore_default='default store';
$showStore_name='store name';
$showStore_count='number';
$showStore_search_input_placeholder='search by store name';

//sale/editStore.php
$editStore_title='edit store';
$editStore_old_name='old name';
$editStore_new_name='new name';
$editStore_submit='edit';

//sale/addStore.php
$addStore_title='add store';
$addStore_name='store name';
$addStore_submit='add';

//sale/addBackup.php
$addBackup_title='Backing up the system';
$addBackup_processing_message='Information Processing';
$addBackup_please_be_patient='This operation may take few second please be patient';
$addBackup_add_backup_message='Backup of the entire system';
$addBackup_successfully_message='Backup operation was successful.';
$addBackup_successfully_back_link='back';

//sale/changeInventory.php
$changeInventory_title='change inventory';
$changeInventory_name='good name';
$changeInventory_barcode='good barcode';
$changeInventory_stock='count';
$changeInventory_store_name='store name';
$changeInventory_comments='comments';
$changeInventory_submit='submit';
$changeInventory_successfully_changed_message='Successfully edited';
$changeInventory_header='Negative numbers are being reduced';

//sale/showAccount.php
$showAccount_title='account turnover';
$showAccount_price='price';
$showAccount_payment='payment';
$showAccount_date='date';
$showAccount_comments='comments';
$showAccount_oa='opinion account';
$showAccount_employe='employe';
$showAccount_factor_number='factor number';
$showAccount_account_count='count';
$showAccount_search_input_placeholder='search by opinon account,factor No.,date';
$showAccount_check='check';

//sale/showCheck.php
$showCheck_title='show check';
$showCheck_bank_name='bank';
$showCheck_bank_branch='branch';
$showCheck_export_date='export date';
$showCheck_deadline_date='deadline date';
$showCheck_check_serial='serial';
$showCheck_check_mood='mood';
$showCheck_price_in_word_format='pirce in word';
$showCheck_account_owener='account owner';
$showCheck_account_number='account number';
$showFactor_change_check_submit_value='change check';
$showFactor_delete_check_submit_value='delete check';
$showCheck_check_status='check status';
$showCheck_status_suspended='suspended';
$showCheck_status_passed='passed';
$showCheck_status_returned='returned';
$showCheck_add_check_comment='In this section to add check please specify number of check that you want to add to this document';
$showCheck_add_check_submit_value='add check';

//sale/addCheck.php
$addCheck_title='add check';
$addCheck_table_title='add check';
$addCheck_check_serial='serial';
$addCheck_check_mood='mood';
$addCheck_check_export_date='export date';
$addCheck_check_deadline_date='deadline date';
$addCheck_check_price='price';
$addCheck_check_bank_name='bank';
$addCheck_check_bank_branch='branch';
$addCheck_check_account_number='account number';
$addCheck_check_account_owener='account owmer';
$addCheck_copy_from_first_check_button_value='Copy the data from the first check';
$addCheck_copy_from_first_check='Copy the data from the first check';
$addCheck_submit_value='add';
$addCheck_check_status='status';
$addCheck_status_suspended='suspended';
$addCheck_status_passed='passed';
$addCheck_status_returned='returned';
$addCheck_check_successfully_added_message1='check number';
$addCheck_check_successfully_added_message2='Successfully added';
$addCheck_check_successfully_added_message3='All check were successfully added , You will redirect to account page in few second.';

//sale/editCheck.php
$editCheck_title='edit check';
$editCheck_table_title='edit check';
$editCheck_check_successfully_edited_message='All check were successfully added , You will redirect to account page in few second.';

//sale/accountTurnover.php
$showAccountTurnover_title='show account turnover';
$accountTurnover_acccount_type_real='real';
$accountTurnover_acccount_type_legal='legal';
$accountTurnover_name_and_family='name and family';
$accountTurnover_company='company';
$accountTurnover_type='type';
$accountTurnover_address='address';
$accountTurnover_tel='tel';
$accountTurnover_mobile='mobile';
$accountTurnover_comments='comments';
$accountTurnover_debtor='debtor';
$accountTurnover_creditor='creditor';
$accountTurnover_balance='balance ';
$accountTurnover_creditor_or_debtor_status='creditor or debtor status';
$accountTurnover_total_debt_until_now='total debt until now';
$accountTurnover_total_credit_until_now='total credit until now';
$accountTurnover_liability='liability';
$accountTurnover_creditory='creditory';
$accountTurnover_present_balance='present balance';
$accountTurnover_second='second';
$accountTurnover_minute='minutes';
$accountTurnover_hour='hour';
$accountTurnover_day='day';
$accountTurnover_month='month';
$accountTurnover_year='year';
$accountTurnover_submit_value='search';
$accountTurnover_showall_submit_value='show all';
$accountTurnover_search_date_from='date from';
$accountTurnover_search_date_to='date to';
$accountTurnover_price='price';
$accountTurnover_payment='payable';
$accountTurnover_the_remaining_amount='remain';
$accountTurnover_date='date';
$accountTurnover_comments='comments';
$accountTurnover_factor_number='factor No.';
$accountTurnover_employe='employe name';
$accountTurnover_check='check';
$accountTurnover_show_comments='show';
$accountTurnover_end_time_of_search='date and time of end searhing';
$accountTurnover_begin_time_of_search='Date end time search';

//sale/showInventoryDetails2.php
$showInventoryDetails2_title='show good in inventory';
$showInventoryDetails2_count='count';
$showInventoryDetails2_search_input_placeholder='search by name,family';
$showInventoryDetails2_employe_name='employe name';
$showInventoryDetails2_stock='count';
$showInventoryDetails2_factor_number='factor No.';
$showInventoryDetails2_inventory_date='date';
$showInventoryDetails2_sell_price='sell price';
$showInventoryDetails2_purchase_price='purchase price';
$showInventoryDetails2_comments='comments';

//sale/displacementStore.php
$displacementStore_title='displacement between stores';
$displacementStore_name='good name';
$displacementStore_barcode='good barcode';
$displacementStore_stock='count';
$displacementStore_store_from='from store';
$displacementStore_store_to='to store';
$displacementStore_comments='comments';
$displacementStore_submit='submit';
$displacementStore_successfully_changed_message='Successfully added';

//sale/editOutgo.php
$editOutgo_successfully_edited_message='Successfully edited';
$editOutgo_title='Edit withdraw from the cash';
$editOutgo_employe_name='reciver name';
$editOutgo_employe_family='family';
$editOutgo_employe_pass='password';
$editOutgo_address='address';
$editOutgo_price='price';
$editOutgo_factor_number='factor No.';
$editOutgo_cashName='cash name';
$editOutgo_date='date';
$editOutgo_type='type';
$editOutgo_type_card='card';
$editOutgo_type_cash='cash';
$editOutgo_comments='comments';
$editOutgo_submit='edit';
$editOutgo_wrong_pass='Password is not correct';

//sale/addAccount.php
$addAccount_title='add account';
$addAccount_price='total price';
$addAccount_payment='payment';
$addAccount_factorNo='factor No.';
$addAccount_oa_name='oponion account';
$addAccount_type='type';
$addAccount_comments='comments';
$addAccount_submit='add';
$addAccount_successfully_added_message='Successfully added';
$addAccount_type_debtor='debtor';
$addAccount_type_creditor='credito';
$addAccount_type='type';

//sale/editAccount.php
$editAccount_title='edit account';
$editAccount_price='total price';
$editAccount_payment='payment';
$editAccount_factorNo='factor No.';
$editAccount_oa_name='oponion account';
$editAccount_type='type';
$editAccount_comments='comments';
$editAccount_submit='edit';
$editAccount_successfully_edited_message='Successfully edited';
$editAccount_type_debtor='debtor';
$editAccount_type_creditor='creditor';
$editAccount_type='type';

//sale/chat.php
$chat_title='chat';

//sale/printCash.php
$printCash_title='print cash clear';

//acLevelCPanel.php
$acLevelCpanel_name='name';
$acLevelCpanel_family='family';
$acLevelCpanel_grade='grade';
$acLevelCpanel_return='back';
$acLevelCpanel_accessDenied_message='Dear colleagues, only the general manager of the Ghif have access to this page';
$acLevelCpanel_title='access lavel management';

//sale/delete.php
$delete_title='delete information';

//sale/addEmploye.php
$addEmploye_title='add employe';
$addEmploye_name='name';
$addEmploye_family='family';
$addEmploye_user='user';
$addEmploye_pass='password';
$addEmploye_tel='tel';
$addEmploye_mobile='mobile';
$addEmploye_address='address';
$addEmploye_birthday='birthday';
$addEmploye_grade='grade';
$addEmploye_salary='salary';
$addEmploye_photo_source='photo';
$addEmploye_comments='comments';
$addEmploye_submit='add';
$addEmploye_successfully_added_message='Successfully added';
$addEmploye_photo_error='Only Jpg format , Max image size : 100 KB';

//sale/editEmploye.php
$editEmploye_title='edit employe';
$editEmploye_name='name';
$editEmploye_family='family';
$editEmploye_user='user';
$editEmploye_pass='password';
$editEmploye_tel='tel';
$editEmploye_mobile='mobile';
$editEmploye_address='address';
$editEmploye_birthday='birthday';
$editEmploye_grade='grade';
$editEmploye_salary='salary';
$editEmploye_photo_source='photo';
$editEmploye_comments='comments';
$editEmploye_submit='edit';
$editEmploye_successfully_edited_message='Successfully edited';
$editEmploye_photo_error='Only Jpg format , Max image size : 100 KB';

//file/photo_upload
$file_photo_upload='Only Jpg format , Max image size : 100 KB';

//install/index.php
$install_title='Software installation';

//install/selectLanguage.php
$selectLanguage_title='Select language';
$install_select_language_fa='فارسی';
$install_select_language_en='English';

//install/step0.php
$step0_title='Ghif agreement';
$step0_agreement='این نسخه نرم افزار قیف به صورت رایگان منتشر شده است و هرگونه سو استفاده و فروش آن ممنوع می باشد .
قیف طبق راهنمای موجود باید نصب گردد .
کلیه بروز رسانی های قیف به صورت رایگان می باشد .
مسئولیت پشتیبان گیری از اطلاعات به عهده شما می باشد .
قیف تنها بر روی یک سیستم فعال می شود و کپی نمودن فایل ها و بانک اطلاعاتی آن باعث غیر فعال شدن آن می گردد .
قیف دارای خدمات پشتیبانی می باشد که برای شرح دقیق آنها می توانید با شماره های پشتیبانی تماس بگیرید و یا از سایت ghif.org اطلاعات کسب نمایید .
نسخه رایگان قیف شامل پشتیبانی نمی شود هرچند کلیه اطلاعات مورد نیاز شما به فایل های آموزشی در سایت قرار دارد .
قیف قابلیت راه اندازی بر روی کلیه دستگاه های دیجیتالی مانند Tablet ، گوشی های هوشمند و ... را دارا می باشد و همچنین می توان آن را به سه صورت : stand alone , network , web base راه اندازی نمود ، آموزش های این موارد نیز در سایت قرار دارد و نیز می توانید با شماره های پشتیبانی از ما مشاوره بگیرید .
قیف قابلیت شخصی سازی برای کاربرد های خاص را دارا می باشد ، برای این امر می توانید از پشتیبانی ما مشاوره بگیرید .
';
$step0_agree='I agree with the terms and conditions of the Ghif';
$step0_submit='Next step';

//install/step1.php
$step1_title='Step 1 - Database settings';
$step1_automatic_config='Click here to automatic adjustment';
$step1_dbSelect_type='Database Type';
$step1_dbSelect_hint='Usually localhost';
$step1_db_name='Database name';
$step1_db_user_name='Database username';
$step1_db_pass='Database password';
$step1_submit='Next step';
$step1_file_saved_successfully='Saving information of settings file successfully done';
$step1_file_save_error='problem with saving information of the setting file';
$step1_db_structure_done='Implementation of database structure successfully done';
$step1_db_structure_error='Problem with implementation of database structure';
$step1_finished_successfully='First step finished successfully';
$step1_redirecting_message='Redirecting to the next step in 5 seconds...';
$step1_error='Problem with first step';

//install/step2.php
$step2_title='Step 2 - Definition of the shop';
$step2_company_name='Company name';
$step2_services='Services';
$step2_guild='Guild';
$step2_tel1='Telephone 1';
$step2_tel2='Telephone 2';
$step2_mobile1='Mobile 1';
$step2_mobile2='Mobile 2';
$step2_address1='Address 1';
$step2_address2='Address 2';
$step2_sms1='SMS 1';
$step2_sms2='SMS 2';
$step2_site1='Website 1';
$step2_site2='Website 2';
$step2_submit='Next Step';
$step2_email1='Email 1';
$step2_email2='Email 2';
$step2_logo='Logo - dimensions: 290*150';
$step2_fax1='Fax 1';
$step2_fax2='Fax 2';
$step2_fields_count='Number of fields';
$step2_country='country';
$step2_state='state';
$step2_location='Get location info from the browser';
$step2_location_attention='If this checkbox is activated the browser asks for permission, please accept it.';

//install/step2p.php
$step2p_title='Step 2 - Definition of the shop';
$step2p_data_saved_successfully='Data saved successfully';
$step2p_data_is_correct='Entered information is correct';
$step2p_redirecting_message='Redirecting to the next step in 5 seconds...';
$step2p_saving_error='Problem with saving data';

//install/step2a.php
$step2a_title='Step 2 - Definition of the shop';
$step2a_company_name='Company name';
$step2a_header_attention='َAttention: first three fields will be inserted in the main good show table.';
$step2a_submit='Next step';
$step2a_filed='Field';

//install/step2ap.php
$step2ap_title='Step 2 - Definition of the shop';
$step2ap_field_data='Informations of the field No. ';
$step2ap_saved_successfully='saved successfully';
$step2ap_field_data_saving_error='Problem with saving information of the field No. ';
$step2ap_data_saved_successfully='Data saved successfully';
$step2ap_entered_data_correct='Entered information is correct';
$step2ap_redirecting_message='Redirecting to the next step in 5 seconds...';
$step2ap_data_saving_error='Problem with saving data';

//install/step3.php
$step3_title='Step 3 - Software installation';
$step3_admin_name='First name';
$step3_admin_family='Last name';
$step3_admin_user_name="Username";
$step3_admin_pass="Password";
$step3_admin_photo="Administator's photo";
$step3_submit='Next step';
$step3_admin_tel='Telephone';
$step3_admin_mobile='Mobile';
$step3_admin_address='Address';
$step3_admin_birthday='Date of birth';
$step3_admin_salary='Salary';
$step3_admin_comments='Comments';

//install/step3p.php
$step3p_title='Step 3 - Software installation';
$step3p_delete_install='Remove install folder from Ghif installation path';
$step3p_install_error='Problem with Ghif installation';
$step3p_data_saved_successfully='Recording data was successfully done';
$step3p_activation_required='Now Ghif needs activation';
$step3p_activation_methods='You can use following methods to activate Ghif';
$step3p_internet_activation='Activation via the internet';
$step3p_phone_activation='Activation via telephone';
$step3p_sms_activation='Activation via SMS';
$step3p_attention='*Please make sure of internet connection before start activation.';

//install/activation.php
$activation_title='Ghif activation';
$activation_serial='Ghif serial number';
$activation_submit='Activation';

//install/checkEncCode.php
$checkEncCode_correct_code='Activation code is correct';
$checkEncCode_incorrect_code='Incorect activation code';
$checkEncCode_installation_finished_successfully='Congratulations! installing of Ghif have successfully done';
$checkEncCode_ghif_login='Click here to enter Ghif';

//sale/printBarcode.php
$printBarcode_title='Print barcode';

//sale/manageReports.php
$manageReports_title='Reports management';
$manageReports_report_sale_in_year='Sale in year';
$manageReports_report_sale_in_this_week='Sale in current week';
$manageReports_other_reports='Other reports';

//sale/ghifSettings.php
$ghifSettings_title='Ghif settings';
$ghifSettings_show_employe='Employees management';
$ghifSettings_show_cashList='Cash management';
$ghifSettings_show_store='Warehouses management';
$ghifSettings_show_backup='Updates managemnet';
$ghifSettings_show_factorExtra='Factor extra fields managemnet';
$ghifSettings_show_update='Ghif updates';

//sale/update.php
$update_title='Ghif updates';
$update_link='To download update file click here';
$update_submit='Update';
$update_latest_version='Latest version';
$update_current_version='Current version';
$update_check_for_update='Check for updates';
$update_changeLog_from='Update from version';
$update_changeLog_to='to';
$update_changeLog_successful='have successfully done.';
$update_error='Problem with update';

//sale/reportSaleInYear.php
$reportSaleInYear_title='Sale report in year';
$reportSaleInYear_example='Example: 2014';
$reportSaleInYear_analyze='Analyze';
$reportSaleInYear_total_sale_in_year='Total sale in year';
$reportSaleInYear_total_sale_and_payment_in_year='Total sale and costs in year';
$reportSaleInYear_price='Price';
$reportSaleInYear_first_month='January';
$reportSaleInYear_second_month='February';
$reportSaleInYear_third_month='March';
$reportSaleInYear_fourth_month='April';
$reportSaleInYear_fifth_month='May';
$reportSaleInYear_sixth_month='June';
$reportSaleInYear_seventh_month='July';
$reportSaleInYear_eighth_month='August';
$reportSaleInYear_ninth_month='September';
$reportSaleInYear_tenth_month='October';
$reportSaleInYear_eleventh_month='November';
$reportSaleInYear_twelfth_month='December';
$reportSaleInYear_sale='Sale';
$reportSaleInYear_payment='Cost';

//general/premiumVersion.php
$premiumVersion_premium_version_required='You need to buy premium version to access this page';
$premiumVersion_buy_premium_version='Click here to buy premium version';
$premiumVersion_accessDenied_message='Insufficient permissions to access this page';

//sale/reportSaleInWeek.php
$reportSaleInWeek_title='Sale report of week';
$reportSaleInWeek_good_choose='Select good';
$reportSaleInWeek_good_name='Stuff name';
$reportSaleInWeek_good_barcode='Barcode';
$reportSaleInWeek_first_day='Monday';
$reportSaleInWeek_second_day='Tuesday';
$reportSaleInWeek_third_day='Wednesday';
$reportSaleInWeek_fourth_day='Thursday';
$reportSaleInWeek_fifth_day='Friday';
$reportSaleInWeek_sixth_day='Saturday';
$reportSaleInWeek_seventh_day='Sunfday';
$reportSaleInWeek_anylize='Analyze';
$reportSaleInWeek_sell_good='sale for good';
$reportSaleInWeek_in_week='in this week';
$reportSaleInWeek_from='from';
$reportSaleInWeek_to='till';
$reportSaleInWeek_sell='Sale';
$reportSaleInWeek_count='Count';

//sale/manageReports.php
$manageReports_report_in_week='Sale in week report';
$manageReports_report_sale='Sale report';

//sale/addPFactor.php
$addPFactor_title='Enter purchase factor';

//sale/addFactorPA4.php
$addFactorPA4_title='Print A4 factor';

//sale/addFactorP.php
$addFactorP_title='Print factor';

//install/createDB.php
$createDb_successfully_message='Database and username added successfully <br /> go to next step';
$createDb_unsuccessfull_message='Problem with registering data';

//install/phoneActivation.php
$phoneActivation_title='Telephone Activation';
$phoneActivation_message='Declare this code to support center for telephone activation';
?>