@include('Layout_forms.headlayout')

<section class="contentsms">
    <h1>Korespondencja seryjna</h1>
    <section class="bg-gray-300 smssection">

        <div class="sendmessage">
            <h3>SMS & E-mail</h3>
            <table class="message">
                <tr>
                    <td> <textarea placeholder="Wpisz swoją wiadomość"></textarea></td>
                </tr>
            </table>
            <div class="studentmessage">
            <table>
                <tr>
                    <th>Imie i nazwisko ucznia</th>
                    <th>Imie i nazwisko rodzica</th>
                    <th>Grupa ucznia</th>
                    <th>Numer telefonu</th>
                    <th>E-mail</th>
                </tr>
                <tr>
                    <td>A</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>B</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>C</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

            </table>
            </div>
            <button class="send">Wyślij</button>

    </section>

</section>
@include('Layout_forms.footerlayout')
