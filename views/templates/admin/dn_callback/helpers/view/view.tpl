{extends file="helpers/view/view.tpl"}
{block name="override_tpl"}
    <div id="container-customer">
        <h2><img src="../img/admin/help2.png" /><span>{if $type == 'question'}Вопрос{elseif $type == 'callback'}Просьба перезвонить{/if} - {$id_request}</span><span style="color:#585A69;padding-left:10px;"> {$date_add}</span></h2>
    </div>
    <br style="clear:both;" />
    <div style="width: 49%; float:left;">
        <fieldset>
            <legend><img src="../img/admin/tab-customers.gif"> Информация о клиенте:</legend>
            <p style="font-weight: bold; font-size: 14px;">{$name}</p>
            <table class="table">
                <tbody>
                {if $phone}<tr><td><b>Телефон:</b></td><td>{$phone}</td></tr>{/if}
                {if $email}<tr><td><b>E-mail:</b></td><td>{$email}</td></tr>{/if}
                {if $url}<tr><td><b>Со страницы:</b></td><td><a href="{$url}">{$url}</a></td></tr>{/if}
                </tbody>
            </table>
        </fieldset>
    </div>
    {if $question}
    <div style="width: 49%; float:right;">
        <fieldset>
            <legend><img src="../img/admin/help.png"> Вопрос:</legend>
            <table class="table">
                <tbody>
                    <tr><td>{$question}</td></tr>
                </tbody>
            </table>
        </fieldset>
    </div>
    {/if}
{/block}