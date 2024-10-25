<?php

/**
 * bottom of the consulting form
 *
 * @package scratch
 */

?>
<tr>
    <th>
        <p class="form_label"><span>相談内容</span><span class="require">必須</span></p><small>（担当者が詳しくお聞きしますので、簡潔にご記入いただければ結構です。）</small>
    </th>
    <td><textarea name="相談内容" cols="50" rows="5" required></textarea></td>
</tr>
<?php get_template_part('template-parts/form-reasons'); ?>
<?php get_template_part('template-parts/form-referral-agency'); ?>