@extends('luxe.layout')

@section('title', 'Contact')

@section('content')
<section class="contact-page">
    <div class="contact-hero">
        <h1>Contact</h1>
        <p>Un service personnalisé à votre écoute</p>
    </div>

    <div class="contact-container">
        <div class="contact-info">
            <div class="info-card">
                <i class="fas fa-map-marker-alt"></i>
                <h3>Boutique Paris</h3>
                <p>18 Avenue Montaigne<br>75008 Paris</p>
                <p class="info-hours">Lun-Sam: 10h-19h</p>
            </div>

            <div class="info-card">
                <i class="fas fa-phone"></i>
                <h3>Téléphone</h3>
                <p>+33 (0)1 42 68 53 00</p>
                <p class="info-note">Du lundi au vendredi, 9h-18h</p>
            </div>

            <div class="info-card">
                <i class="fas fa-envelope"></i>
                <h3>Email</h3>
                <p>contact@elegance.com</p>
                <p class="info-note">Réponse sous 24h</p>
            </div>

            <div class="info-card">
                <i class="fas fa-user"></i>
                <h3>Conseiller personnel</h3>
                <p>Prendre rendez-vous</p>
                <a href="#" class="rdv-link">Réserver une consultation</a>
            </div>
        </div>

        <div class="contact-form-section">
            <h2>Nous écrire</h2>
            <form class="contact-form" method="POST" action="#">
                @csrf
                <div class="form-group">
                    <input type="text" name="nom" placeholder="Nom" required>
                    <input type="text" name="prenom" placeholder="Prénom" required>
                </div>
                <div class="form-group">
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="tel" name="telephone" placeholder="Téléphone">
                </div>
                <div class="form-group">
                    <select name="sujet" required>
                        <option value="">Sujet</option>
                        <option value="commande">Commande</option>
                        <option value="service">Service client</option>
                        <option value="rendezvous">Rendez-vous</option>
                        <option value="presse">Presse</option>
                    </select>
                </div>
                <div class="form-group">
                    <textarea name="message" placeholder="Votre message" rows="6" required></textarea>
                </div>
                <button type="submit" class="submit-btn">
                    Envoyer le message <i class="fas fa-paper-plane"></i>
                </button>
            </form>
        </div>
    </div>

    <div class="contact-map">
        <div class="map-placeholder">
            <i class="fas fa-map"></i>
            <p>Carte de localisation</p>
            <p>18 Avenue Montaigne, 75008 Paris</p>
        </div>
    </div>
</section>

<style>
.contact-page {
    max-width: 1400px;
    margin: 0 auto;
    padding: 2rem;
}

.contact-hero {
    text-align: center;
    padding: 4rem 0;
    margin-bottom: 3rem;
}

.contact-hero h1 {
    font-size: 3.5rem;
    margin-bottom: 1rem;
    letter-spacing: 3px;
}

.contact-hero p {
    color: #666;
    font-size: 1.1rem;
    letter-spacing: 1px;
}

.contact-container {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 4rem;
    margin-bottom: 4rem;
}

.contact-info {
    display: grid;
    grid-template-columns: 1fr;
    gap: 2rem;
}

.info-card {
    padding: 2rem;
    border: 1px solid #eee;
    transition: transform 0.3s;
}

.info-card:hover {
    transform: translateY(-5px);
}

.info-card i {
    font-size: 1.5rem;
    margin-bottom: 1.5rem;
    color: #666;
}

.info-card h3 {
    font-size: 1.2rem;
    margin-bottom: 1rem;
    letter-spacing: 1px;
}

.info-card p {
    color: #666;
    margin-bottom: 0.5rem;
    font-size: 0.95rem;
}

.info-hours, .info-note {
    font-size: 0.85rem;
    color: #999;
    font-style: italic;
}

.rdv-link {
    display: inline-block;
    margin-top: 1rem;
    color: #1a1a1a;
    text-decoration: none;
    font-size: 0.9rem;
    border-bottom: 1px solid transparent;
    transition: border-color 0.3s;
}

.rdv-link:hover {
    border-bottom-color: #1a1a1a;
}

.contact-form-section {
    padding: 2rem;
}

.contact-form-section h2 {
    font-size: 2rem;
    margin-bottom: 2rem;
    letter-spacing: 2px;
}

.contact-form .form-group {
    margin-bottom: 1.5rem;
    display: flex;
    gap: 1rem;
}

.contact-form input,
.contact-form select,
.contact-form textarea {
    flex: 1;
    padding: 1rem;
    border: 1px solid #ddd;
    font-family: 'Montserrat', sans-serif;
    font-size: 0.9rem;
    background: white;
}

.contact-form textarea {
    resize: vertical;
}

.submit-btn {
    width: 100%;
    padding: 1.2rem;
    background: #1a1a1a;
    color: white;
    border: none;
    font-family: 'Montserrat', sans-serif;
    font-size: 0.9rem;
    letter-spacing: 2px;
    cursor: pointer;
    transition: background 0.3s;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
}

.submit-btn:hover {
    background: #333;
}

.contact-map {
    margin: 4rem 0;
}

.map-placeholder {
    width: 100%;
    height: 400px;
    background: linear-gradient(45deg, #f0f0f0, #e5e5e5);
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    color: #999;
    font-size: 1.2rem;
}

.map-placeholder i {
    font-size: 3rem;
    margin-bottom: 1rem;
}

@media (max-width: 1024px) {
    .contact-container {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 768px) {
    .contact-form .form-group {
        flex-direction: column;
    }
}
</style>
@endsection