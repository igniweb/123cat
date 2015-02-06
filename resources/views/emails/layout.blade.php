<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width">
    <style type="text/css">
        <?php
        ob_start();
        include base_path('resources/views/emails/header/_ink.css');
        include base_path('resources/views/emails/header/_styles.css');
        echo ob_get_clean();
        ?>
    </style>
</head>
<body>
    <table class="body">
        <tr>
            <td class="center" align="center" valign="top">
                <center>
                    @include('emails.header._topbar')
                    <table class="container">
                        <tr>
                            <td>
                                <table class="row">
                                    <tr>
                                        <td class="wrapper last">
                                            <table class="twelve columns">
                                                <tr>
                                                    <td>
                                                        @yield('main')
                                                    </td>
                                                    <td class="expander"></td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                                @include('emails.footer._next-cat')
                                @include('emails.footer._contact')
                                @include('emails.footer._webring')
                            </td>
                        </tr>
                    </table>
                </center>
            </td>
        </tr>
    </table>
</body>
</html>
