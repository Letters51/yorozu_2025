<?php

/**
 * radio buttons for applying reasons
 *
 * @package scratch
 */

?>
<tr>
    <th>
        <p class="form_label pt_00"><span>申込みのきっかけ</span><span class="require">必須</span></p>
    </th>
    <td>
        <div class="form_reasons">
            <label class="form_reasons__label"><input class="form_reasons__radio" type="radio" name="申込みのきっかけ" value="いばらき中小企業グローバル推進機構HP" required>いばらき中小企業グローバル推進機構HP</label>
            <label class="form_reasons__label"><input class="form_reasons__radio" type="radio" name="申込みのきっかけ" value="いばらき中小企業グローバル推進機構メルマガ">いばらき中小企業グローバル推進機構メルマガ</label>
            <label class="form_reasons__label"><input class="form_reasons__radio" type="radio" name="申込みのきっかけ" value="茨城県よろず支援拠点HP">茨城県よろず支援拠点HP</label>
            <label class="form_reasons__label"><input class="form_reasons__radio" type="radio" name="申込みのきっかけ" value="茨城県よろず支援拠点コーディネーターからの紹介">茨城県よろず支援拠点コーディネーターからの紹介</label>
            <label class="form_reasons__label"><input id="apply_reason_else_radio" class="form_reasons__radio" type="radio" name="申込みのきっかけ" value="その他">その他</label>
            <div class="sub_form apply_reason_else_wrap mt_01">
                <input id="apply_reason_else" type="text" name="申込みのきっかけ記入欄" placeholder="その他の場合の記入欄（任意）">
            </div>
        </div>
    </td>
</tr>