<x-DashLayout :title="__('msg.support')">
    <x-atoms.alert />
    <div class="dashboard-collection container py-4">
        <x-atoms.header-dashboard title="{{ __('msg.documentation') }} / {{ __('msg.support') }}" />

        <!-- Support Page Start -->
        <div class="support-page">
            <h2>Support / Dukungan</h2>

            <h3>1. Customer Support / Layanan Pelanggan</h3>
            <p>
                If you have questions or need assistance, our support team is ready to help.
                <br>
                Jika Anda memiliki pertanyaan atau membutuhkan bantuan, tim dukungan kami siap membantu.
            </p>
            <ul>
                <li>Email: ndexo.idn@gmail.com</li>
                <li>Phone / WhatsApp: +62 881-0263-50444</li>
            </ul>

            <h3>2. Frequently Asked Questions (FAQ) / Pertanyaan yang Sering Diajukan</h3>
            <ul>
                <li><strong>How to purchase products? / Bagaimana cara membeli produk?</strong>
                    Visit our website, select your desired products, and follow the checkout process.
                    <br> Kunjungi website kami, pilih produk yang diinginkan, dan ikuti proses checkout.
                </li>
                <li><strong>How to return an item? / Bagaimana cara mengembalikan barang?</strong>
                    Contact our support team within 7 days of receiving the item to process returns.
                    <br> Hubungi tim dukungan kami dalam 7 hari setelah menerima barang untuk proses pengembalian.
                </li>
                <li><strong>How to track my order? / Bagaimana cara melacak pesanan?</strong>
                    After purchase, you will receive a tracking number via email or WhatsApp.
                    <br> Setelah membeli, Anda akan menerima nomor pelacakan melalui email atau WhatsApp.
                </li>
            </ul>

            <h3>3. Technical Support / Dukungan Teknis</h3>
            <ul>
                <li>Reset password / Reset kata sandi: Use the "Forgot Password" link on the login page / Gunakan link
                    "Lupa Kata Sandi" di halaman login</li>
                <li>Login issues / Masalah login: Ensure your account email is correct / Pastikan email akun Anda benar
                </li>
                <li>Website errors / Error website: Try clearing your browser cache or contact support / Coba bersihkan
                    cache browser atau hubungi dukungan</li>
            </ul>

            <h3>4. Feedback & Suggestions / Masukan & Saran</h3>
            <p>
                We welcome your feedback to improve our services. You can submit ideas, suggestions, or report issues
                via email or form below.
                <br>
                Kami menyambut masukan Anda untuk meningkatkan layanan kami. Anda dapat mengirimkan ide, saran, atau
                melaporkan masalah melalui email atau formulir di bawah ini.
            </p>
            <form action="#" method="POST" class="mb-4">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name / Nama</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Message / Pesan</label>
                    <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Send / Kirim</button>
            </form>

            <h3>5. Support Policy / Kebijakan Dukungan</h3>
            <p>
                Our support team is available Monday to Friday, 09:00 – 17:00 WIB. Response time may take up to 24
                hours.
                <br> Tim dukungan kami tersedia Senin – Jumat, 09:00 – 17:00 WIB. Waktu tanggapan dapat memakan waktu
                hingga 24 jam.
            </p>

            <h3>6. Contact Information / Informasi Kontak</h3>
            <ul>
                <li>Email: support@ndexo.com</li>
                <li>Phone / WhatsApp: +62 881-0263-50444</li>
                <li>Address / Alamat: Jl. Margobasuki No.2. Malang, Indonesia</li>
            </ul>
        </div>
        <!-- Support Page End -->
    </div>
</x-DashLayout>
