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
            <label class="form_reasons__label"><input class="form_reasons__radio" type="radio" name="申込みのきっかけ" value="その他" required>その他</label>
            <div class="sub_form mt_01">
                <input id="apply_reason_else" type="text" name="申込みのきっかけ（自由欄）" placeholder="その他を選択した場合はこちらをご記入ください">
            </div>
        </div>
    </td>
</tr>