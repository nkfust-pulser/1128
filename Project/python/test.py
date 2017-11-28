# -*- coding: utf-8 -*-
"""
Created on Sat Nov 25 13:29:17 2017

@author: USER
"""

import sys
import os
script_dir = os.path.dirname(__file__)
rel_path = ("{0}.txt" .format(sys.argv[1]))
abs_file_path = os.path.join(script_dir, rel_path)
print(rel_path)
