def write_output(name, contents):
    path = f"/app/output/{name}"
    with open(path, "a") as output_file:
        for element in contents:
            output_file.write(str(element))
