Chat Structure
===
need to know who is logged in at the moment >> store info in variable. Solution: for testing, just set a constant. Hardcode both the user and the person they are chatting with.

Messaging
---
You've already clicked into the person you want to talk to.
**Landing page: Chatroom.**

initialization:
- `UserMatchesContains (cID, firstUser, secondUser, date)`
- `Conversations(cID)`

gui:
---
- text box
- send message button

message:
---
- timestamp + date (store and retrieve)
- who sent it (store and retrieve)
- `HasUserMessages (meID, timeSent, text, userEmail, cID)`

extras:
---
- different colors for different users