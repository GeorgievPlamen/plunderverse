<form id="create-form" method="POST">
    <div>
        <label for="name">Name</label>
        <input
            type="text"
            name="name"
            id="name"
            maxlength="50"
            required />
    </div>
    <div>
        <label for="ship">Ship</label>
        <input
            type="text"
            name="ship"
            id="ship"
            maxlength="50"
            required />
    </div>
    <div>
        <label for="bio">Bio</label>
        <textarea
            name="bio"
            id="bio"
            placeholder="Write something about yourself"
            maxlength="200"
            required>
          </textarea>
    </div>
    <p>Total max: 5</p>
    <div id="stats-input-container">
        <div id="stat-input">
            <label for="vitality">Vitality</label>
            <input type="number" name="vitality" id="vitality" value="1" max="3">
        </div>
        <div id="stat-input">
            <label for="strength">Strength</label>
            <input type="number" name="strength" id="strength" value="1" max="3">
        </div>
        <div id="stat-input">
            <label for="charisma">Charisma</label>
            <input type="number" name="charisma" id="charisma" value="1" max="3">
        </div>
    </div>
    <button onclick="createCharacters">Create</button>

</form>