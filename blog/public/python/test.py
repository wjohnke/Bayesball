

import json
import random

per =random.uniform(57.000000, 61.0000)
pre=random.randint(0,1)

jsonVal = {'Prediction':pre, 'Percentage': per}
print(json.dumps(jsonVal))