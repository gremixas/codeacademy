<section>
    <header>
        <h1>
            Naujas žaidimas
        </h1>
    </header>
    <form method="POST" action="store.php">
        <label for="game-name">Name:</label>
        <input id="game-name" type="text" name="name">

        <label for="release-date">Release data:</label>
        <input id="release-date" type="date" name="release_date">

        <label for="image">Image:</label>
        <input id="image" type="text" name="image">

        <label for="genre">Genre:</label>
        <input id="genre" type="text" name="genre">

        <label for="developer">Developer:</label>
        <input id="developer" type="text" maxlength="20" name="developer">

        <label for="description-short">Description short:</label>
        <input id="description-short" type="text" maxlength="130" name="description_short">
        
        <label for="description">Description:</label>
        <textarea id="description" rows="5" type="text" name="description"></textarea>

        <input type="submit" value="Submit">
    </form>
</section>