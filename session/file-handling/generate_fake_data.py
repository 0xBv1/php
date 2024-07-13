import random
import string

def generate_fake_data():
    users = []
    for _ in range(100):
        username = ''.join(random.choices(string.ascii_lowercase, k=8))
        email = f'{username}@example.com'
        password = ''.join(random.choices(string.ascii_letters + string.digits, k=10))
        users.append(f'{username}:{email}:{password}')
    return users

fake_data = generate_fake_data()

with open('c:/xampp/htdocs/php/session/file-handling/test.txt', 'w') as file:
    file.write('\n'.join(fake_data))
    print("Fake data has been generated and saved to test.txt.")