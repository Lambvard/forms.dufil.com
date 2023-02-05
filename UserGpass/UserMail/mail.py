import win32com.client
ol=win32com.client.Dispatch("outlook.application")
olmailitem=0x0 #size of the new email
newmail=ol.CreateItem(olmailitem)
newmail.Subject= 'Testing Mail'
newmail.To='tunde.afolabi@dufil.com'
newmail.CC='tunde.afolabi@dufil.com'
newmail.Body= 'Hello, click this link to approve https://forms.dufil.com/usergpass/'
# attach='C:\\Users\\admin\\Desktop\\Python\\Sample.xlsx'
# newmail.Attachments.Add(attach)
# To display the mail before sending it
# newmail.Display()
newmail.Send()