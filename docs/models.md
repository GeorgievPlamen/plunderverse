# Character Model

Id: PK number
Name: nvarchar(50)
Ship: nvarchar(50)
Bio: nvarchar(200)
stats: json {
Vitality: number // Adds a bonus to Health (10 + Vitality \* 2 )
Strength: number // Adds a bonus to attack (2d6 + Strength \* 2)
Charisma: number // Adds starting credits and gives a bonus in conversations
}

Credits: number // Starting is 1000 + (Charisma \* 500)
CurrentXp: number // Current xp
XpToLevel: number// xp to level up
Level: number
LastUpdated: date
