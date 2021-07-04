def write_output(name, contents):
    path = f"/app/output/{name}"
    with open(path, "a") as output_file:
        for element in contents:
            if type(element) is list:
                element = len(element)
            output_file.write(str(element))
            output_file.write("\n")
